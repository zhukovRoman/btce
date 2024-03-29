<?php

class InfoController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
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
				'actions'=>array('index','view', 'get'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
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
		$model=new Info;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Info']))
		{
			$model->attributes=$_POST['Info'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}
        
        public function actionGet($pair)
	{

		if($pair != null)
		{
                        $path = "https://btc-e.com/api/3/ticker/";
			$model->pair = $pair;
                        $response = file_get_contents ($path.$pair);
                        if ($response)
                        {
                            $model=new Info;
                            $arr = json_decode($response, true);
                            //print_r($arr);
                            $model->pair = $pair;
                            $model->high = $arr[$pair]['high'];
                            $model->low = $arr[$pair]['low'];
                            $model->avg = $arr[$pair]['avg'];
                            $model->vol = $arr[$pair]['vol'];
                            $model->vol_cur = $arr[$pair]['vol_cur'];
                            $model->last = $arr[$pair]['last'];
                            $model->last = $arr[$pair]['last'];
                            $model->buy = $arr[$pair]['buy'];
                            $model->sell = $arr[$pair]['sell'];
                            $model->updated = $arr[$pair]['updated'];
                            
                            //{"btc_usd":{"high":874.89899,"low":835,"avg":854.949495,"vol":7153230.0684,"vol_cur":8383.97642,
                            //"last":850.6,"buy":850.6,"sell":850.597,"updated":1387048111}}
                            if($model->save())
                                echo "Ok";
                        }
			//
			//	$this->redirect(array('view','id'=>$model->id));
		}
                else echo "Pair not set!";
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

		if(isset($_POST['Info']))
		{
			$model->attributes=$_POST['Info'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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
		$dataProvider=new CActiveDataProvider('Info');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Info('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Info']))
			$model->attributes=$_GET['Info'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Info the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Info::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Info $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='info-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
