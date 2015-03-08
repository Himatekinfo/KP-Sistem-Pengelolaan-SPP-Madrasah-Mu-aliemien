<?php

class SiswaController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('admin', 'delete','create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array(),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $dataDdlKelas = CHtml::listData(Kelas::model()->findall(), 'Id', 'Kelas');
        $dataDdlSekolah = CHtml::listData(Sekolah::model()->findall(), 'Id', 'Sekolah');
        $dataDdlJurusan = CHtml::listData(Jurusan::model()->findall(), 'Id', 'Jurusan');
        $dataDdltahunajaran = StaticHelper::GetYears(date("Y")-3,date("Y")+3);
        $model = new Siswa;
        $modelhistorykelas = new HistoryKelas;
        $modelhistorykelas->SekolahId = Yii::app()->user->getState("SekolahId");


        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Siswa'])) {
            $model->attributes = $_POST['Siswa'];
            try {
                if ($model->save())
                {
                    $modelhistorykelas->attributes = $_POST['HistoryKelas'];
                    $modelhistorykelas->No_Induk = $model->No_Induk;
                    
                    if($modelhistorykelas->save()) {
                        $this->redirect(array('view', 'id' => $model->No_Induk));
                    } else {
                        throw new CException("Failed to save history kelas. Detail: " . print_r($modelhistorykelas->errors, true));
                    }
                } else {
                    throw new CException("Failed to save siswa. Detail: " + print_r($model->errors, true));
                }
            } catch(CException $e)
            {
                throw new CException("Invalid data. Detail: " 
                        . $e->getMessage() . "(" . $e->getFile() . ":" . $e->getLine() . ")");
            }
        }

        $this->render('create', array(
            'model' => $model,
            'modelhistorykelas' => $modelhistorykelas,
            'dataDdlKelas'=> $dataDdlKelas,
            'dataDdlSekolah'=> $dataDdlSekolah,
            'dataDdlJurusan'=>$dataDdlJurusan,
            'dataDdltahunajaran'=>$dataDdltahunajaran,
            
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $dataDdlKelas = CHtml::listData(Kelas::model()->findall(), 'Id', 'Kelas');
        $dataDdlSekolah = CHtml::listData(Sekolah::model()->findall(), 'Id', 'Sekolah');
        $dataDdlJurusan = CHtml::listData(Jurusan::model()->findall(), 'Id', 'Jurusan');
        $dataDdltahunajaran = StaticHelper::GetYears(2012,2016);
        $model = $this->loadModel($id);
        $modelhistorykelas = new HistoryKelas;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Siswa'])) {
            $model->attributes = $_POST['Siswa'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->No_Induk));
        }

        $this->render('update', array(
            'model' => $model,
            'modelhistorykelas' => $modelhistorykelas,
            'dataDdlKelas'=> $dataDdlKelas,
            'dataDdlSekolah'=> $dataDdlSekolah,
            'dataDdlJurusan'=>$dataDdlJurusan,
            'dataDdltahunajaran'=>$dataDdltahunajaran,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $this->loadModel($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
        else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Siswa');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Siswa('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Siswa']))
            $model->attributes = $_GET['Siswa'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = Siswa::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'siswa-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
