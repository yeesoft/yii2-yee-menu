<?php

namespace yeesoft\menu\controllers;

use yeesoft\controllers\admin\BaseController;
use yeesoft\menu\models\search\SearchMenuLink;
use yii\helpers\StringHelper;
use Yii;

/**
 * MenuLinkController implements the CRUD actions for Post model.
 */
class LinkController extends BaseController
{
    public $modelClass = 'yeesoft\models\MenuLink';
    public $modelSearchClass = 'yeesoft\menu\models\search\SearchMenuLink';
    public $enableOnlyActions = ['delete', 'update', 'create'];

    protected function getRedirectPage($action, $model = null)
    {
        switch ($action) {
            case 'delete':
                $searchClass = $this->modelSearchClass;
                $formName = StringHelper::basename($searchClass::className());
                return ['/menu/default/index', "{$formName}[menu_id]" => $model->menu_id];
                break;
            case 'update':
                return ['update', 'id' => $model->id];
                break;
            case 'create':
                return ['update', 'id' => $model->id];
                break;
            default:
                return parent::getRedirectPage($action, $model);
        }
    }
}