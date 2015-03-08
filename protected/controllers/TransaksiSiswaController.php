<?php

class TransaksiSiswaController extends Controller
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
				'actions'=>array('index','view','getnis'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('admin','delete','create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array(),
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
                $dataDdljnstransaksi = CHtml::listData(jnstransaksi::model()->findall(), 'JnstransaksiId', 'NamaJnsTransaksi');
                $dataDdlsiswa = CHtml::listData(siswa::model()->findall(), 'No_Induk', 'NamaSiswa');
                
		$model=new TransaksiSiswa;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['TransaksiSiswa']))
		{
			$model->attributes=$_POST['TransaksiSiswa'];
            $model->UserId=Yii::app()->user->getState('Id');
			if($model->save())
				$this->redirect(array('view','id'=>$model->Id));
		}

		$this->render('create',array(
			'model'=>$model,
                        'dataDdljnstransaksi'=>$dataDdljnstransaksi,
                        'dataDdlsiswa'=>$dataDdlsiswa,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
                $dataDdljnstransaksi = CHtml::listData(jnstransaksi::model()->findall(), 'JnstransaksiId', 'NamaJnsTransaksi');
                $dataDdlsiswa = CHtml::listData(siswa::model()->findall(), 'No_Induk', 'NamaSiswa');
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['TransaksiSiswa']))
		{
			$model->attributes=$_POST['TransaksiSiswa'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->Id));
		}

		$this->render('update',array(
			'model'=>$model,
                        'dataDdljnstransaksi'=>$dataDdljnstransaksi,
                        'dataDdlsiswa'=>$dataDdlsiswa,
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
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('TransaksiSiswa');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
        //fungsi untuk memanggil untuk autocomplete
        public function actionGetNis($term)
        {
            $model = Siswa::model()->findAll("NamaSiswa LIKE '%$term%' or No_Induk LIKE '%$term%'");
            $out = null;
            foreach($model as $siswa)
            {
                $out[] = array('label'=>$siswa->No_Induk . ":" . $siswa->NamaSiswa, 'value'=>$siswa->No_Induk);
            }
            
            echo CJSON::encode($out);
            return;
        }

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new TransaksiSiswa('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['TransaksiSiswa']))
			$model->attributes=$_GET['TransaksiSiswa'];

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
		$model=TransaksiSiswa::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='transaksi-siswa-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
