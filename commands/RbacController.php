<?php
namespace app\commands;

use Yii;
use yii\console\Controller;
use app\models\User;
use app\rbac\UserGroupRule;

class RbacController extends Controller
{
	/**
	 * @var array. Default permissions for users.
	 * Example: [
	 *				// access to action 'example1' will have only users with roles  ['user', 'manager']
	 *				'example1' => [	'description' => '_description_',
	 *									'only' => ['user', 'manager']
	 *								],
	 *				// access to action 'example1' will have all users with roles from $this->roles, except ['user']
	 *				'example2' => [	'description' => '_description_',
	 *									'except' => ['user']
	 *								],
	 *				// access to action 'example3' will have all users with roles from $this->roles
	 *				'example3' => []
	 *			]
	 * ['only'] - @var array. List of roles who have access for this action.
	 * ['except'] - @var array. List of roles who don't have access for this action.
	 ** For checking user's access use basic yii method Yii::$app->user->can('example1').
	 ** And/or you can use AccessControl behavior in controller
	 */
	private $permissions = [
			'admin-access' => [
					'description' => 'admins',
					'only' => [User::ROLE_ADMIN]
			],
			'student' => [
					'description' => 'admins',
					'only' => [User::ROLE_ADMIN,User::ROLE_MODERATOR]
			],
			'subject' => [
					'description' => 'admins',
					'only' => [User::ROLE_ADMIN]
			],
			'all' => [
					'description' => 'All',
					'except' => []
			],
	];

	public function actionInit()
	{
		$auth = Yii::$app->authManager;
		$auth->removeAll();

		$rule = new UserGroupRule();
		$auth->add($rule);

		foreach ($this->permissions as $name=>$info)
		{
			$permission = $auth->getPermission($name);
			if (!$permission)
			{
				$permission = $auth->createPermission($name);
				if (isset($info['description']))
				{
					$permission->description = $info['description'];
				};
				$permission->ruleName = $rule->name;
				$auth->add($permission);
			}

			$roles = $this->getRolesForPermission($name);
			foreach ($roles as $roleName)
			{
				$role = $auth->getPermission($roleName);
				if (!$role && in_array($roleName, User::getTrustedRoles()))
				{
					$role = $auth->createRole($roleName);
					$role->ruleName = $rule->name;
					$auth->add($role);
				}
				$auth->addChild($role, $permission);
			}
		}
	}

	/***
	 * get array roles for insert name from $this->permissions
	 * @param $name
	 * @return array
	 */
	protected function getRolesForPermission($name)
	{
		$rules = $this->permissions[$name];
		if (isset($rules['only']) && count($rules['only'])>0)
		{
			$roles = $rules['only'];
		}
		elseif (isset($rules['except']) && count($rules['except'])>0)
		{
			$roles = User::getTrustedRoles();
			foreach ($rules['except'] as $exceptRole)
			{
				if(($key = array_search($exceptRole, $roles)) !== false) {
					unset($roles[$key]);
				}
			}
		}
		else
			$roles = User::getTrustedRoles();

		return $roles;
	}
}