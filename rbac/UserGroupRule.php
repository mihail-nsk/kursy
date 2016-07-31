<?php

namespace app\rbac;

use Yii;
use yii\rbac\Rule;

/**
 * Checks if user group matches
 */
class UserGroupRule extends Rule
{
    public $name = 'userGroup';

    public function execute($user, $item, $params)
    {
		$userIdentity = Yii::$app->user->isGuest ? \app\models\User::findOne($user) : null;
        if ($userIdentity || !Yii::$app->user->isGuest) {
			$role = (Yii::$app->user->isGuest ? $userIdentity->role : Yii::$app->user->identity->role);
			$auth = Yii::$app->authManager;
			$permissions = array_keys($auth->getPermissionsByRole($role));
			return (($item->name === $role) || (in_array($item->name, $permissions)));
		}
        return false;
    }
}