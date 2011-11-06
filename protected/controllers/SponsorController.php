<?php

class SponsorController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}
    
    /**
     * Used to ensure the logo upload doesn't overwrite when updating a record.
     */
    public function safeAttributes()
    {
        return array(
            'create'=>'name, url, status',
            'name, url, status'
        );
    }

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('admin','index','view','getLogo','delete'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

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
	 */
	public function actionCreate()
	{
		$model=new Sponsor;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Sponsor']))
		{
			$model->attributes=$_POST['Sponsor'];
            $model->portal_id = $_GET['portal_id'];
            
            $logo = CUploadedFile::getInstance($model,'logo');
            if (is_object($logo) && get_class($logo)==='CUploadedFile') {
                $model->logo = $logo;
            }
            
			if($model->save())
				$this->redirect(array('index', 'portal_id'=>$model->portal_id));
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

		if(isset($_POST['Sponsor']))
		{
			$model->attributes=$_POST['Sponsor'];
            
            $logo = CUploadedFile::getInstance($model,'logo');
            if (is_object($logo) && get_class($logo)==='CUploadedFile') {
                $model->logo = $logo;
            }
            
			if($model->save())
				$this->redirect(array('admin'));
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
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex($portal_id)
	{
		$model=new Sponsor('search');
		$model->unsetAttributes();  // clear any default values
        $model->portal_id = $portal_id;

		$this->render('index',array(
			'model'=>$model,
		));
/*    
		$dataProvider=new CActiveDataProvider('Sponsor');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
*/        
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
        /*
		$model=new Sponsor('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Sponsor']))
			$model->attributes=$_GET['Sponsor'];
        */
/*        
        $user = User::model()->findByPk(Yii::app()->user->id);
        $bar_id = $user->bar->id;
        $model = Sponsor::model()->find('bar_id=:barID', array(':barID'=>$bar_id));
*/
        $user = User::model()->findByPk(Yii::app()->user->id);

		$model=new Sponsor('search');
		$model->unsetAttributes();  // clear any default values

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Sponsor::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='sponsor-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
    
	public function actionGetLogo()
	{
    	$model=$this->loadModel($_GET['id']);
    
 		//Increase the view count for LOGO. This method needs to be added.
    	header('Pragma: public');
   		header('Expires: 0');
    	header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    	header('Content-Transfer-Encoding: binary');
    	//header('Content-length: '.$model->file_size); //Find php funtion to find length of image.
    	//http://php.net/manual/en/function.getimagesize.php
    	header('Content-Type: ',$model->logo_content_type);
    	echo $model->logo; //=logo
        
	}
}
