<?php
/**
 * Copyright (C) Baluart.COM - All Rights Reserved
 *
 * @since 1.3
 * @author Balu
 * @copyright Copyright (c) 2015 - 2020 Baluart.COM
 * @license http://codecanyon.net/licenses/faq Envato marketplace licenses
 * @link https://easyforms.dev/ Easy Forms
 */

namespace app\models\forms;

use Da\User\Form\RegistrationForm as BaseForm;
use Yii;

class RegistrationForm extends BaseForm
{
    /**
     * @var string
     */
    public $captcha;

    /**
     * @inheritdoc
     */
    public function rules() {

        $rules = parent::rules();

        if (Yii::$app->settings->get('app.useCaptcha')) {
            $rules[] = ['captcha', 'required'];
            $rules[] = ['captcha', 'captcha', 'captchaAction'=>'user/registration/captcha'];
        }

        return $rules;
    }
}