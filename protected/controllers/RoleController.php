<?php

/**
 * SiteController is the default controller to handle user requests.
 */
class RoleController extends CController {
	public $layout = 'management';
	private $_model;
	
	/**
	 * Index action is the default action in a controller.
	 */
	public function actionIndex() {
		// Permission
		if (! UserLoginUtil::hasPermission ( array (
				"FULL_ADMIN",
				"VIEW_EQUIPMENT",
				"CREATE_EQUIPMENT",
				"UPDATE_EQUIPMENT",
				"DELETE_EQUIPMENT" 
		) )) {
			throw new CHttpException ( 404, Yii::t ( 'yii', 'The system is unable to find the requested', array (
					'{action}' => $actionID == '' ? $this->defaultAction : $actionID 
			) ) );
		}
		
		$model = new Role ();
		
		// Set Search Text
		if (isset ( $_GET ['search_text'] )) {
			$model->search_text = addslashes ( $_GET ['search_text'] );
		}
		
		$this->render ( 'main', array (
				'data' => $model 
		) );
	}
	public function actionPermissions() {
		// Permission
		if (! UserLoginUtil::hasPermission ( array (
				"FULL_ADMIN",
				"MANAGE_ROLE_PERMISSION" 
		) )) {
			throw new CHttpException ( 404, Yii::t ( 'yii', 'The system is unable to find the requested', array (
					'{action}' => $actionID == '' ? $this->defaultAction : $actionID 
			) ) );
		}
		$model = $this->loadModel ();
		
		if (isset ( $_POST ['permissions'] )) {
			$permissions = $_POST ['permissions'];
			$permissions = Permission::model ()->findAll ();
			foreach ( $permissions as $permission ) {
				if (isset ( $_POST ['permissions'] [$permission->permission_code] )) {
					// Add
					$permission_code = addslashes ( $_POST ['permissions'] [$permission->permission_code] );
					$rp = RolePermission::model ()->findByAttributes ( array (
							'role_id' => $model->id,
							'permission_code' => $permission_code 
					) );
					if (! isset ( $rp )) {
						$rolePermission = new RolePermission ();
						$rolePermission->role_id = $model->id;
						$rolePermission->permission_code = $permission_code;
						$rolePermission->save ();
					}
				} else {
					// Delete
					$permission_code = $permission->permission_code;
					$rp = RolePermission::model ()->findByAttributes ( array (
							'role_id' => $model->id,
							'permission_code' => $permission_code 
					) );
					if (isset ( $rp )) {
						RolePermission::model ()->deleteAllByAttributes ( array (
								'role_id' => $model->id,
								'permission_code' => $permission_code 
						) );
					}
				}
			}
			
			$this->redirect ( Yii::app ()->createUrl ( 'role/view/id/' . $model->id ) );
		} else {
			$this->render ( 'manage_permissions', array (
					'model' => $model 
			) );
		}
	}
	public function actionCreate() {
		// Permission
		if (! UserLoginUtil::hasPermission ( array (
				"FULL_ADMIN",
				"CREATE_USER" 
		) )) {
			throw new CHttpException ( 404, Yii::t ( 'yii', 'The system is unable to find the requested', array (
					'{action}' => $actionID == '' ? $this->defaultAction : $actionID 
			) ) );
		}
		
		if (isset ( $_POST ['Role'] )) {
			$transaction = Yii::app ()->db->beginTransaction ();
			// Add Request
			$role = new Role ();
			$role->attributes = $_POST ['Role'];
			$addSuccess = true;
			try {
				if (! $role->save ()) {
					$addSuccess = false;
				}
				if ($addSuccess) {
					$transaction->commit ();
					$this->redirect ( Yii::app ()->createUrl ( 'Role/' ) );
				} else {
					$transaction->rollback ();
					$model = new RequestService ();
					$this->render ( 'create' );
				}
			} catch ( CDbException $e ) {
				$this->redirect ( Yii::app ()->createUrl ( 'Error/503' ) );
			}
		} else {
			// Render
			$this->render ( 'create' );
		}
	}
	public function actionDelete() {
		// Permission
		if (! UserLoginUtil::hasPermission ( array (
				"FULL_ADMIN",
				"DELETE_USER" 
		) )) {
			throw new CHttpException ( 404, Yii::t ( 'yii', 'The system is unable to find the requested', array (
					'{action}' => $actionID == '' ? $this->defaultAction : $actionID 
			) ) );
		}
		
		$model = $this->loadModel ();
		$model->delete ();
		
		$this->redirect ( Yii::app ()->createUrl ( 'Role/' ) );
	}
	public function actionView() {
		// Permission
		if (! UserLoginUtil::hasPermission ( array (
				"FULL_ADMIN",
				"VIEW_EQUIPMENT" 
		) )) {
			throw new CHttpException ( 404, Yii::t ( 'yii', 'The system is unable to find the requested', array (
					'{action}' => $actionID == '' ? $this->defaultAction : $actionID 
			) ) );
		}
		
		$model = $this->loadModel ();
		$this->render ( 'view', array (
				'data' => $model 
		) );
	}
	public function actionUpdate() {
		// Permission
		if (! UserLoginUtil::hasPermission ( array (
				"FULL_ADMIN",
				"UPDATE_USER" 
		) )) {
			throw new CHttpException ( 404, Yii::t ( 'yii', 'The system is unable to find the requested', array (
					'{action}' => $actionID == '' ? $this->defaultAction : $actionID 
			) ) );
		}
		
		$model = $this->loadModel ();
		if (isset ( $_POST ['Role'] )) {
			$transaction = Yii::app ()->db->beginTransaction ();
			// Add Request
			$model->attributes = $_POST ['Role'];
			$addSuccess = true;
			try {
				if (! $model->update ()) {
					$addSuccess = false;
				}
				if ($addSuccess) {
					$transaction->commit ();
					$this->redirect ( Yii::app ()->createUrl ( 'Role/' ) );
				} else {
					$transaction->rollback ();
				}
			} catch ( CDbException $e ) {
				$this->redirect ( Yii::app ()->createUrl ( 'Error/503' ) );
			}
		}
		$this->render ( 'update', array (
				'model' => $model 
		) );
	}
	public function loadModel() {
		if ($this->_model === null) {
			if (isset ( $_GET ['id'] )) {
				$id = addslashes ( $_GET ['id'] );
				$this->_model = Role::model ()->findbyPk ( $id );
			}
			if ($this->_model === null)
				throw new CHttpException ( 404, 'The requested page does not exist.' );
		}
		return $this->_model;
	}
}