<?php
/**
 * Copyright (C) Baluart.COM - All Rights Reserved
 *
 * @since 1.9.2
 * @author Balu
 * @copyright Copyright (c) 2015 - 2020 Baluart.COM
 * @license http://codecanyon.net/licenses/faq Envato marketplace licenses
 * @link https://easyforms.dev/ Easy Forms
 */
namespace app\controllers\user;

use Da\User\Controller\RegistrationController as BaseRegistrationController;
use Da\User\Event\FormEvent;
use Da\User\Factory\MailFactory;
use Da\User\Form\ResendForm;
use Da\User\Model\User;
use Da\User\Service\ResendConfirmationService;
use Da\User\Validator\AjaxRequestModelValidator;
use Yii;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;

/**
 * Class RegistrationController
 * @package app\controllers\user
 */
class RegistrationController extends BaseRegistrationController
{

    public $layout = "public";

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['register', 'connect', 'captcha'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['confirm', 'resend'],
                        'roles' => ['?', '@'],
                    ],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'backColor' => 0x313941,
                'foreColor' => 0xFFFFFF,
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actionResend()
    {
        if ($this->module->enableEmailConfirmation === false) {
            throw new NotFoundHttpException();
        }
        /** @var ResendForm $form */
        $form = $this->make(ResendForm::class);
        $event = $this->make(FormEvent::class, [$form]);

        $this->make(AjaxRequestModelValidator::class, [$form])->validate();

        if ($form->load(Yii::$app->request->post()) && $form->validate()) {
            /** @var User $user */
            $user = $this->userQuery->whereEmail($form->email)->one();
            $success = true;
            if ($user !== null) {
                $this->trigger(FormEvent::EVENT_BEFORE_RESEND, $event);
                $mailService = MailFactory::makeConfirmationMailerService($user);
                if ($success = $this->make(ResendConfirmationService::class, [$user, $mailService])->run()) {
                    $this->trigger(FormEvent::EVENT_AFTER_RESEND, $event);
                    Yii::$app->session->setFlash(
                        'info',
                        Yii::t(
                            'app',
                            'A message has been sent to your email address. It contains a confirmation link that you must click to complete registration.'
                        )
                    );
                }
            }
            if ($user === null || $success === false) {
                Yii::$app->session->setFlash(
                    'danger',
                    Yii::t(
                        'app',
                        'We couldn\'t re-send the mail to confirm your address. Please, verify is the correct email or if it has been confirmed already.'
                    )
                );
            }

            return $this->redirect(['/user/security/login']);
        }

        return $this->render(
            'resend',
            [
                'model' => $form,
            ]
        );
    }
}