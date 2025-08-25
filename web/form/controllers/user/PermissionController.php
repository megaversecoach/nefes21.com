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

use Da\User\Filter\AccessRuleFilter;
use Da\User\Controller\PermissionController as BaseController;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class PermissionController extends BaseController
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'ruleConfig' => [
                    'class' => AccessRuleFilter::className(),
                ],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['managePermissions'],
                    ],
                ],
            ],
        ];
    }

}