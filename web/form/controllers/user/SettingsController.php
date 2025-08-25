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

use Yii;
use Da\User\Controller\SettingsController as BaseSettingsController;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

/**
 * Class SettingsController
 * @package app\controllers\user
 */
class SettingsController extends BaseSettingsController
{

    public $layout = "/admin"; // In @app/views/layouts

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'disconnect' => ['post'],
                    'delete' => ['post'],
                    'two-factor-disable' => ['post']
                ],
            ],
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => [
                            'profile',
                            'account',
                            'export',
                            'networks',
                            'privacy',
                            'gdpr-delete',
                            'disconnect',
                            'delete',
                            'two-factor',
                            'two-factor-enable',
                            'two-factor-disable',
                            'preferences',
                        ],
                        'roles' => ['@'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['confirm'],
                        'roles' => ['?', '@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * User Preferences
     */
    public function actionPreferences()
    {
        // Default values
        if ($post = Yii::$app->request->post()) {
            if (isset($post['action']) && $post['action'] === 'session') {
                $timeout = Yii::$app->request->post('session_timeout_value', 0);
                Yii::$app->user->preferences->set('App.User.SessionTimeout.value', $timeout);
                Yii::$app->user->preferences->save();
                // Show success alert
                Yii::$app->getSession()->setFlash(
                    'success',
                    Yii::t('app', 'Your preferences have been successfully updated.')
                );
            }
        }
        return $this->render('preferences');
    }
}