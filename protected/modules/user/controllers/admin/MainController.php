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

//        public function actionCreatefolder()
//	{
//            //echo Yii::getPathOfAlias('webroot');die;
//            $succ = mkdir(Yii::getPathOfAlias('webroot').'/users/anli/tmp');
//        }
        
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new User;
                
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
                        if($_POST['User']['password'] != '')
                            $_POST['User']['password'] = md5($_POST['User']['password']);
			$model->attributes=$_POST['User'];
                        if($_POST['User']['date_create'] == '')
                            $model->date_create = null;
                        $model->scenario = 'create';
			if($model->save())
                        {
                            $succ = mkdir(Yii::getPathOfAlias('webroot').'/users/'.$model->nick);
                            $model->date_update = $model->date_create;
                            $model->save(false, array('date_update'));
                            $this->redirect(array('view','id'=>$model->id));
                        }
		}

		$this->render('create',array(
			'model'=>$model,
                        'regions'=>Region::model()->findAll(),
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
                
                GlobalFunction::delTmpFiles('/users/'.$model->nick.'/tmp/*');
                
                //echo "<pre>";
                //print_r($model);die;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
                        if($_POST['User']['password'] != '')
                        {
                            $_POST['User']['password'] = md5($_POST['User']['password']);
                        }
                        else
                        {
                            $_POST['User']['password'] = $model->password;
                        }
                        $_POST['User']['date_update'] = date('Y-m-d H:i:s');
			$model->attributes=$_POST['User'];
                        $model->scenario = 'update';
			if($model->save())
				$this->redirect(array('update','id'=>$model->id));
		}

                //print_r(CHtml::listData(Region::model()->findAll(), 'id', 'name'));die;
                
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
                //$succ = rmdir(Yii::getPathOfAlias('webroot').'/users/'.$model->nick);
                
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('User');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new User('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User']))
			$model->attributes=$_GET['User'];

                $this->render('admin',array(
			'model'=>$model,
		));
	}
        
	/**
	 * Manages user categories.
	 */
	public function actionCategories($id)
	{
            
            $categories = new Category('search');
            $categories->unsetAttributes();  // clear any default values
            if(isset($_GET['Category']))
                    $categories->attributes=$_GET['Category'];
            
            $this->render('categories',array(
                'categories' => $categories,
                'model' => $this->loadModel($id),
            ));
	}
        
	/**
	 * Manages user categories.
	 */
	public function actionCategory($id, $user_id)
	{
            
            $category = UserCategory::model()->find('user_id = '.$user_id.' AND category_id = '.$id);
            $category->begin_year = UserCategory::model()->getExperience($category->begin_year);

            if(isset($_POST['UserCategory']))
            {
                $_POST['UserCategory']['begin_year'] = date('Y') - $_POST['UserCategory']['begin_year'];
                $category->attributes = $_POST['UserCategory'];
                if($category->save())
                        $this->redirect(Yii::app()->request->urlReferrer);
            }
            
            $this->render('category',array(
                'category' => $category,
                'model' => $this->loadModel($user_id),
            ));
	}

	/**
	 * Ajax method on/off user categories.
	 */
	public function actionCheckCategory($user = 0, $category = 0)
	{
            if(Yii::app()->request->isAjaxRequest)
            {
                $condition = 'user_id = '.$user.' AND category_id = '.$category;
                $model = UserCategory::model()->find($condition);
                if(empty($model))
                {
                    $model = new UserCategory;
                    $model->user_id = $user;
                    $model->category_id = $category;
                    $model->save(false);
                }
                else
                {
                    $model->deleteAll($condition);
                }
            }
            
            echo "ok";
	}

        
        
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return User the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=User::model()->with('regions')->with('categories')->findByPk($id);
                //echo '<pre>';print_r($model);die;
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param User $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        public function actionUpload($nick)
        {
                Yii::import("ext.EAjaxUpload.qqFileUploader");

                $folder = 'users/'.$nick.'/tmp/';// folder for uploaded files
                $allowedExtensions = array("jpg", "png", "gif");//array("jpg","jpeg","gif","exe","mov" and etc...
                $sizeLimit = 2 * 1024 * 1024;// maximum file size in bytes
                $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
                $result = $uploader->handleUpload($folder);
                $param = getimagesize($folder.$result['filename']);
                $result['k'] = $param[0]/$param[1];
                //$result['height'] = $param[1];
                $return = htmlspecialchars(json_encode($result), ENT_NOQUOTES);
                
                $fileSize = filesize($folder.$result['filename']);//GETTING FILE SIZE
                $fileName = $result['filename'];//GETTING FILE NAME

                echo $return;// it's array
        }
//        
//        public function actionTest()
//        {
//            $pp_hostname = "www.sandbox.paypal.com";
//
//            $auth_token = "GroBXKof0sStd0lIfQotWBKxU5uOhcZiJPFFbBgYqKF7u_XYOS60HP-Xrfe";
//
//            $req = 'cmd=_notify-synch';
//            $req .= "&tx=3K332446CF3973218&at=$auth_token";
//
//            $ch = curl_init();
//            curl_setopt($ch, CURLOPT_URL, "https://$pp_hostname/cgi-bin/webscr");
//            curl_setopt($ch, CURLOPT_POST, 1);
//            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//            curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
//            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
//            //set cacert.pem verisign certificate path in curl using 'CURLOPT_CAINFO' field here,
//            //if your server does not bundled with default verisign certificates.
//            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
//            curl_setopt($ch, CURLOPT_HTTPHEADER, array("Host: $pp_hostname"));
//            $res = curl_exec($ch);
//            curl_close($ch);
//
//            echo $res;exit;
//        }
        
}
