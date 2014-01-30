<?php

class MainController extends BackendController
{
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.

	public function actionCreate()
	{
		$model=new Project;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Project']))
		{
			$model->attributes=$_POST['Project'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}
         * 
         */

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

		if(isset($_POST['Project']))
		{
			$model->attributes=$_POST['Project'];
                        $model->save();
		}

                $modelPhoto = new Photo('search');
                
		$this->render('update',array(
			'model' => $model,
                        //'modelPhoto' => Photo::model()->find('project_id = :project_id', array(':project_id' => $model->id)),
                        'modelPhoto' => $modelPhoto,
                        'videos' => Video::model()->find('project_id = :project_id', array(':project_id' => $model->id)),
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
		$dataProvider=new CActiveDataProvider('Project');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Project('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Project']))
			$model->attributes=$_GET['Project'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Project the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model = Project::model()->with('user')->with('category')->findByPk($id);
		if($model === null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Project $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='project-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        public function actionUpload($id)
        {
            if(!Yii::app()->request->isAjaxRequest)
            {
                return false;
            }
            
            Yii::import("ext.EAjaxUpload.qqFileUploader");

            $model = $this->loadModel($id);
            GlobalFunction::delTmpFiles('/users/'.$model->user->nick.'/tmp/*');

            $folder = 'users/'.$model->user->nick.'/tmp/';// folder for uploaded files
            $allowedExtensions = array("jpg", "png", "gif");//array("jpg","jpeg","gif","exe","mov" and etc...
            $sizeLimit = Yii::app()->params['imageMaxSize'] * 1024 * 1024;// maximum file size in bytes
            //$sizeLimit = 0.1 * 1024 * 1024;// maximum file size in bytes
            $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
            $result = $uploader->handleUpload($folder);
            if(isset($result['success']))
            {   
                $newName = md5(time()).substr($result['filename'],-4);
                if(rename($folder.$result['filename'], $folder.$newName))
                {
                    $result['filename'] = $newName;
                }
                else
                {
                    return false;
                }
                
                $param = getimagesize($folder.$result['filename']);
                if(Yii::app()->params['thumbnailWidth'] > $param[0] || Yii::app()->params['thumbnailHeight'] > $param[1])
                {
                    $result['success'] = false;
                    $result['error'] = Yii::t('ProjectModule.project','Image sizes are too small.');
                    echo htmlspecialchars(json_encode($result), ENT_NOQUOTES);
                    return true;
                }

                $path = Yii::getPathOfAlias('webroot').'/users/'.$model->user->nick;
                //вычисляем окно кропа (по средине изображения), для миниатюры
                $dataCrop = Photo::dimensionThumbnail(
                    Yii::app()->params['thumbnailWidth'], 
                    Yii::app()->params['thumbnailHeight'], 
                    $param[0], 
                    $param[1]
                );
                //сохраняем миниатюру
                Yii::app()->ih
                    ->load($path.'/tmp/'.$result['filename'])
                    ->crop($dataCrop[0], $dataCrop[1], $dataCrop[2], $dataCrop[3])
                    ->resize(Yii::app()->params['thumbnailWidth'], Yii::app()->params['thumbnailHeight'])
                    ->save($path.'/projects/'.$id.'/thumbnail/'.$result['filename']);
                
                //вычисляем новые пропорции рисунка
                $newSize = Photo::dimension(
                    Yii::app()->params['imageMaxWidth'], 
                    Yii::app()->params['imageMaxHeight'], 
                    $param[0], 
                    $param[1]
                );
                //сохраняем рисунок в пропорциях в нужном проекте
                Yii::app()->ih
                    ->load($path.'/tmp/'.$result['filename'])
                    ->resize($newSize[0], $newSize[1])
                    ->save($path.'/projects/'.$id.'/'.$result['filename']);

                //сохраняем в базу
                $photo = new Photo;
                $photo->project_id = $id;
                $photo->filename = $result['filename'];
                $photo->save(false);
                $photo->sort = $photo->id;
                $photo->save(false, array('sort'));

                $result['width'] = $param[0];
                $result['height'] = $param[1];
            }
            $return = htmlspecialchars(json_encode($result), ENT_NOQUOTES);

            //$fileSize = filesize($folder.$result['filename']);//GETTING FILE SIZE
            //$fileName = $result['filename'];//GETTING FILE NAME

            echo $return;// it's array
        }
        
        public function actionCropPhoto()
        {
            if(!Yii::app()->request->isAjaxRequest)
            {
                return false;
            }
            
            $model = $this->loadModel($_POST['projectId']);
            
            if(!empty($model))
            {
                $path = Yii::getPathOfAlias('webroot').'/users/'.$model->user->nick;
                $fullName = $path.'/projects/'.$model->id.'/thumbnail/'.$_POST['filename'];
                if(file_exists($fullName))
                {
                    unlink($fullName);
                }
                Yii::app()->ih
                    ->load($path.'/tmp/'.$_POST['filename'])
                    ->crop($_POST['width'], $_POST['height'], $_POST['x'], $_POST['y'])
                    ->resize(Yii::app()->params['thumbnailWidth'], Yii::app()->params['thumbnailHeight'])
                    ->save($fullName);
                echo 'ok';
            }
            exit;
        }        
}
