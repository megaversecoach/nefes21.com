<?php
/**
 * Copyright (C) Baluart.COM - All Rights Reserved
 *
 * @since 1.0
 * @author Balu
 * @copyright Copyright (c) 2015 - 2020 Baluart.COM
 * @license http://codecanyon.net/licenses/faq Envato marketplace licenses
 * @link https://easyforms.dev/ Easy Forms
 */

namespace app\events\handlers;

use app\events\SubmissionEvent;
use app\events\SubmissionMailEvent;
use app\helpers\MailHelper;
use app\helpers\SubmissionHelper;
use app\models\Form;
use app\models\FormConfirmation;
use app\models\FormEmail;
use app\models\FormSubmission;
use Yii;
use yii\base\Component;

/**
 * Class SubmissionEventHandler
 * @package app\events\handlers
 */
class SubmissionEventHandler extends Component
{

    /**
     * Executed when a submission is received
     *
     * @param $event
     */
    public static function onSubmissionReceived($event)
    {
    }

    /**
     * Executed when a submission is accepted
     *
     * @param $event
     * @throws \Exception
     */
    public static function onSubmissionAccepted($event)
    {

        /** @var FormSubmission $submissionModel */
        $submissionModel = $event->submission;
        /** @var Form $formModel */
        $formModel = empty($event->form) ? $submissionModel->form : $event->form;
        /** @var array $filePaths */
        $filePaths = empty($event->filePaths) ? [] : $event->filePaths;

        // If file paths are empty, find them by model relation
        if (empty($filePaths)) {
            $fileModels = $submissionModel->files;
            foreach ($fileModels as $fileModel) {
                $filePaths[] = $fileModel->getFilePath();
            }
        }

        /*******************************
        /* Send Notification by e-mail
        /*******************************/
        if (isset($formModel->formEmail, $formModel->formEmail->event)
            && $formModel->formEmail->event === FormSubmission::STATUS_ACCEPTED) {
            self::sendNotificationByEmail($formModel, $submissionModel, $filePaths);
        }

        /*******************************
        /* Send Confirmation by e-mail
        /*******************************/
        self::sendConfirmationByEmail($formModel, $submissionModel, $filePaths);

    }

    /**
     * Executed when a submission is rejected
     *
     * @param $event
     */
    public static function onSubmissionRejected($event)
    {
    }

    /**
     * Executed when a submission is verified by link click
     *
     * @param SubmissionEvent $event
     * @throws \Exception
     */
    public static function onSubmissionVerified($event)
    {
        /** @var FormSubmission $submissionModel */
        $submissionModel = $event->submission;
        /** @var Form $formModel */
        $formModel = empty($event->form) ? $submissionModel->form : $event->form;
        /** @var array $filePaths */
        $filePaths = empty($event->filePaths) ? [] : $event->filePaths;

        // If file paths are empty, find them by model relation
        if (empty($filePaths)) {
            $fileModels = $submissionModel->files;
            foreach ($fileModels as $fileModel) {
                $filePaths[] = $fileModel->getFilePath();
            }
        }

        /*******************************
        /* Send Notification by e-mail
        /*******************************/
        if (isset($formModel->formEmail, $formModel->formEmail->event)
            && $formModel->formEmail->event === FormSubmission::STATUS_VERIFIED) {
            self::sendNotificationByEmail($formModel, $submissionModel, $filePaths);
        }
    }

    /**
     * Send Notification Message By E-Mail
     *
     * @param Form $formModel
     * @param FormSubmission $submissionModel
     * @param array $filePaths
     * @return bool
     * @throws \Exception
     */
    public static function sendNotificationByEmail($formModel, $submissionModel, $filePaths = [])
    {
        $result = false;

        /** @var \app\models\FormData $dataModel */
        $dataModel = $formModel->formData;
        /** @var array $submissionData */
        $submissionData = $submissionModel->getSubmissionData();
        /** @var FormEmail $emailModel */
        $emailModel = $formModel->formEmail;

        $mailTo = [];

        if (!empty($emailModel->to)) {
            $mailTo = explode(',', $emailModel->to);
        }

        if (!empty($emailModel->field_to)) {
            foreach ($emailModel->field_to as $fieldTo) {
                // To (Get value of email field)
                $to = isset($submissionData[$fieldTo]) ? $submissionData[$fieldTo] : null;
                // Remove all illegal characters from email
                $to = filter_var($to, FILTER_SANITIZE_EMAIL);
                // Validate e-mail
                if (!filter_var($to, FILTER_VALIDATE_EMAIL) === false) {
                    $mailTo[] = $to;
                }
            }
        }

        // Check first: Recipient and Sender are required
        if (isset($emailModel->from) && !empty($mailTo)) {

            // Async Email
            $async = MailHelper::async();

            // Sender by default: No-Reply Email
            $fromEmail = MailHelper::from(Yii::$app->settings->get("app.noreplyEmail"));
            // Sender verification
            if (empty($fromEmail)) {
                return false;
            }

            // Form fields
            $fieldsForEmail = $dataModel->getFieldsForEmail();
            // Submission data in an associative array
            $fieldValues = SubmissionHelper::prepareDataForReplacementToken($submissionData, $fieldsForEmail);
            // Submission data in a multidimensional array: [0 => ['label' => '', 'value' => '']]
            $fieldData = SubmissionHelper::prepareDataForSubmissionTable($submissionData, $fieldsForEmail);
            // Custom Message
            $customMessage = SubmissionHelper::replaceSubmissionTableToken($emailModel->message, $fieldData, $emailModel->plain_text);
            // Data
            $data = [
                'fieldValues' => $fieldValues, // Submission data for replacement
                'fieldData' => $fieldData, // Submission data for print details
                'formID' => $formModel->id,
                'submissionID' => isset($submissionModel->primaryKey) ? $submissionModel->primaryKey : null,
                'message' => $customMessage,
            ];

            // Views
            $notificationViews = $emailModel->getEmailViews();
            // Subject
            $subject = isset($emailModel->subject) && !empty($emailModel->subject) ?
                $emailModel->subject :
                $formModel->name . ' - ' . Yii::t('app', 'New Submission');
            // Token replacement in subject
            $subject = SubmissionHelper::replaceTokens($subject, $fieldValues);
            // ReplyTo (can be an email or an email field)
            $replyToField = isset($submissionData[$emailModel->from]) ? $submissionData[$emailModel->from] : null;
            $replyTo = $emailModel->fromIsEmail() ? $emailModel->from :
                $replyToField;
            if (empty($replyTo)) {
                // By default, we use the no-reply email address
                $replyTo = Yii::$app->settings->get("app.noreplyEmail");
            }

            // Add name to From
            if (!empty($emailModel->from_name)) {

                $fromName = isset($submissionData[$emailModel->from_name]) ?
                    $submissionData[$emailModel->from_name] : $emailModel->from_name;
                $fromName = is_array($fromName) ? implode(",", $fromName) : $fromName;

                $replyTo = [
                    $replyTo => $fromName,
                ];
                if (is_array($fromEmail)) {
                    $fromEmail = [
                        key($fromEmail) => $fromName,
                    ];
                } else {
                    $fromEmail = [
                        $fromEmail => $fromName,
                    ];
                }
            }

            // Compose email
            /** @var \app\components\queue\Message $message */
            $message = Yii::$app->mailer->compose($notificationViews, $data)
                ->setFrom($fromEmail)
                ->setTo($mailTo)
                ->setSubject($subject);

            // Add reply to
            if (!empty($replyTo)) {
                $message->setReplyTo($replyTo);
            }

            // Add cc
            if (!empty($emailModel->cc)) {
                $message->setCc(explode(',', $emailModel->cc));
            }

            // Add bcc
            if (!empty($emailModel->bcc)) {
                $message->setBcc(explode(',', $emailModel->bcc));
            }

            // Attach files
            if ($emailModel->attach && count($filePaths) > 0) {
                foreach ($filePaths as $filePath) {
                    $message->attach(Yii::getAlias('@app') . DIRECTORY_SEPARATOR . $filePath);
                }
            }

            // Trigger Event
            Yii::$app->trigger(SubmissionMailEvent::EVENT_NAME, new SubmissionMailEvent([
                'submission' => $submissionModel,
                'type' => SubmissionMailEvent::EVENT_TYPE_NOTIFICATION,
                'message' => $message,
                'async' => $async,
                'tokens' => $fieldValues,
            ]));

            // Send E-mail
            if ($async) {
                $result = $message->queue();
            } else {
                $result = $message->send();
            }

        }

        return $result;
    }

    /**
     * Send Confirmation Message By E-Mail
     *
     * @param Form $formModel
     * @param FormSubmission $submissionModel
     * @param array $filePaths
     * @return bool
     * @throws \Exception
     */
    public static function sendConfirmationByEmail($formModel, $submissionModel, $filePaths = [])
    {
        $result = false;

        /** @var \app\models\FormData $dataModel */
        $dataModel = $formModel->formData;
        /** @var array $submissionData */
        $submissionData = $submissionModel->getSubmissionData();
        /** @var FormConfirmation $confirmationModel */
        $confirmationModel = $formModel->formConfirmation;

        // Check first: Send email must be active and Recipient is required
        if ($confirmationModel->send_email &&
            isset($confirmationModel->mail_to) && !empty($confirmationModel->mail_to)) {

            // Async Email
            $async = MailHelper::async();

            // Sender by default: No-Reply Email
            $fromEmail = MailHelper::from(Yii::$app->settings->get("app.noreplyEmail"));
            // Sender verification
            if (empty($fromEmail)) {
                return false;
            }

            // Form fields
            $fieldsForEmail = $dataModel->getFieldsForEmail();
            // Submission data in an associative array
            $fieldValues = SubmissionHelper::prepareDataForReplacementToken($submissionData, $fieldsForEmail);
            // Submission data in a multidimensional array: [0 => ['label' => '', 'value' => '']]
            $fieldData = SubmissionHelper::prepareDataForSubmissionTable($submissionData, $fieldsForEmail);
            // Custom Message
            $customMessage = isset($confirmationModel->mail_message) && !empty($confirmationModel->mail_message) ?
                SubmissionHelper::replaceSubmissionTableToken($confirmationModel->mail_message, $fieldData) :
                Yii::t('app', 'Thanks for your message');

            foreach ($confirmationModel->mail_to as $mailTo) {
                // To (Get value of email field)
                $to = isset($submissionData[$mailTo]) ? $submissionData[$mailTo] : null;
                // Remove all illegal characters from email
                $to = filter_var($to, FILTER_SANITIZE_EMAIL);

                // Validate e-mail
                if (!filter_var($to, FILTER_VALIDATE_EMAIL) === false) {

                    // Views
                    $confirmationViews = $confirmationModel->getEmailViews();

                    // Message
                    $data = [
                        'fieldValues' => $fieldValues, // Submission data for replacement
                        'fieldData' => $fieldData, // Submission data for print details
                        'mail_receipt_copy' => (boolean) $confirmationModel->mail_receipt_copy, // Add submission copy
                        'message' => $customMessage,
                    ];

                    // Subject
                    $subject = isset($confirmationModel->mail_subject) && !empty($confirmationModel->mail_subject) ?
                        $confirmationModel->mail_subject : Yii::t('app', 'Thanks for your message');

                    // Token replacement in subject
                    $subject = SubmissionHelper::replaceTokens($subject, $fieldValues);

                    // ReplyTo
                    $replyTo = isset($confirmationModel->mail_from) && !empty($confirmationModel->mail_from) ?
                        $confirmationModel->mail_from : Yii::$app->settings->get("app.noreplyEmail");

                    // Add name to From
                    if (isset($confirmationModel->mail_from_name) && !empty($confirmationModel->mail_from_name)) {
                        $replyTo = [
                            $replyTo => $confirmationModel->mail_from_name,
                        ];
                        if (is_array($fromEmail)) {
                            $fromEmail = [
                                key($fromEmail) => $confirmationModel->mail_from_name,
                            ];
                        } else {
                            $fromEmail = [
                                $fromEmail => $confirmationModel->mail_from_name,
                            ];
                        }
                    }

                    // Compose email
                    /** @var \app\components\queue\Message $message */
                    $message = Yii::$app->mailer->compose($confirmationViews, $data)
                        ->setFrom($fromEmail)
                        ->setTo($to)
                        ->setSubject($subject);

                    // Add reply to
                    if (!empty($replyTo)) {
                        $message->setReplyTo($replyTo);
                    }

                    // Attach files
                    if ($confirmationModel->mail_receipt_copy && $confirmationModel->mail_attach && count($filePaths) > 0) {
                        foreach ($filePaths as $filePath) {
                            $message->attach(Yii::getAlias('@app') . DIRECTORY_SEPARATOR . $filePath);
                        }
                    }

                    // Trigger Event
                    Yii::$app->trigger(SubmissionMailEvent::EVENT_NAME, new SubmissionMailEvent([
                        'submission' => $submissionModel,
                        'type' => SubmissionMailEvent::EVENT_TYPE_CONFIRMATION,
                        'message' => $message,
                        'async' => $async,
                        'tokens' => $fieldValues,
                    ]));

                    // Send E-mail
                    if ($async) {
                        $result = $message->queue();
                    } else {
                        $result = $message->send();
                    }
                }
            }
        }

        return $result;
    }
}
