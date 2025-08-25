<?php
/**
 * Copyright (C) Baluart.COM - All Rights Reserved
 *
 * @since 1.1
 * @author Balu
 * @copyright Copyright (c) 2015 - 2020 Baluart.COM
 * @license http://codecanyon.net/licenses/faq Envato marketplace licenses
 * @link https://easyforms.dev/ Easy Forms
 */

namespace app\helpers;

use Yii;

/**
 * Class Mailer
 * @package app\helpers
 *
 * Add business logic related to sending emails
 */
class MailHelper
{

    /**
     * Return the sender email address according to app configuration
     *
     * @param string $sender Email by default
     * @return string Email address
     */
    public static function from($sender = '')
    {

        /** @var \app\components\queue\MailQueue $mailer */
        $mailer = Yii::$app->mailer;

        // Check for messageConfig before sending (for backwards-compatible purposes)
        if (isset($mailer->messageConfig, $mailer->messageConfig["from"]) &&
            !empty($mailer->messageConfig["from"])) {
            $sender = $mailer->messageConfig["from"];
        } elseif (isset(Yii::$app->params['App.Mailer.transport']) &&
            Yii::$app->params['App.Mailer.transport'] === 'smtp' &&
            (!filter_var(Yii::$app->settings->get("smtp.username"), FILTER_VALIDATE_EMAIL) === false)) {
            // Set smtp username as sender
            $sender = Yii::$app->settings->get("smtp.username");
        }

        // Add name to Sender
        if (is_string($sender)
            && (!filter_var($sender, FILTER_VALIDATE_EMAIL) === false)) {
            $from = $sender;
            if ($senderName = trim(Yii::$app->settings->get("app.defaultFromName"))) {
                $from = [$sender => $senderName];
            } elseif ($senderName = trim(Yii::$app->settings->get("app.name"))) {
                $from = [$sender => $senderName];
            }
            $sender = $from;
        }

        return $sender;
    }

    /**
     * Check if the email should be asynchronous
     *
     * @return bool
     */
    public static function async()
    {
        // Async Email
        $async = !empty(Yii::$app->params['App.Mailer.async']) && Yii::$app->params['App.Mailer.async'] === 1;
        $async = (boolean) Yii::$app->settings->get('async', 'app', $async);
        $async = $async && Yii::$app->settings->get('mailerTransport', 'app', 'php') === 'smtp';
        return $async;
    }
}
