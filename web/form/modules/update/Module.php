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

namespace app\modules\update;

use Yii;
use yii\filters\AccessControl;

class Module extends \yii\base\Module
{
    public $defaultRoute = 'step/1';

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'matchCallback' => function () {
                            // For DB versions lower than 1.10
                            Yii::$app->settings->clearCache();
                            if (!Yii::$app->settings->get('version', 'app', false)) {
                                return true;
                            } else {
                                if (version_compare(Yii::$app->version, Yii::$app->settings->get('version', 'app', '1.10'))) {
                                    // Permission required: Perform application updates
                                    if (Yii::$app->user->can("performUpdates")) {
                                        return true;
                                    }
                                }
                            }

                            // By Default, Denied Access
                            return false;
                        }
                    ],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // set up i8n
        if (empty(Yii::$app->i18n->translations['update'])) {
            Yii::$app->i18n->translations['update'] = [
                'class' => 'yii\i18n\PhpMessageSource',
                'sourceLanguage' => 'en-US',
                'basePath' => '@app/modules/update/messages',
                //'forceTranslation' => true,
            ];
        }

    }
}
