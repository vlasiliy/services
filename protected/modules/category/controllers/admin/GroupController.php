<?php

class GroupController extends BackendController
{

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed

	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}
         * 
         */

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Groupcategory;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Groupcategory']))
		{
			$model->attributes=$_POST['Groupcategory'];
                        $model->scenario = 'create';
			if($model->save())
				$this->redirect(array('admcats','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Groupcategory']))
		{
			$model->attributes=$_POST['Groupcategory'];
                        $model->scenario = 'update';
			if($model->save())
				$this->redirect(array('admin','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Groupcategory');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Groupcategory('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Groupcategory']))
			$model->attributes=$_GET['Groupcategory'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
        
	/**
	 * Manages categories of group.
	 */
	public function actionAdmcats($id)
	{
//		$model=new Groupcategory('search');
//		$model->unsetAttributes();  // clear any default values
//		if(isset($_GET['Groupcategory']))
//			$model->attributes=$_GET['Groupcategory'];
//
//		$this->render('admin',array(
//			'model'=>$model,
//		));
                $this->render('admcats');
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Groupcategory the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Groupcategory::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Groupcategory $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='groupcategory-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
