<?php

class TransaksiPengeluaranController extends Controller {

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
                'actions' => array('admin', 'delete','create', 'update','report'),
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
        $dataDdlSatuan = CHtml::listData(Satuan::model()->findall(), 'Id', 'Satuan');
        
        $model = new TransaksiPengeluaran;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['TransaksiPengeluaran'])) {
            $model->attributes = $_POST['TransaksiPengeluaran'];
            $model->UserId=Yii::app()->user->getState('Id');
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->Id));
        }

        $this->render('create', array(
            'model' => $model,
            'dataDdlSatuan'=> $dataDdlSatuan,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        
        $dataDdlSatuan = CHtml::listData(Satuan::model()->findall(), 'Id', 'Satuan');
        $model = $this->loadModel($id);
       

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['TransaksiPengeluaran'])) {
            $model->attributes = $_POST['TransaksiPengeluaran'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->Id));
        }

        $this->render('update', array(
           
            'model' => $model,
            'dataDdlSatuan'=>$dataDdlSatuan,
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
        $dataProvider = new CActiveDataProvider('TransaksiPengeluaran');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new TransaksiPengeluaran('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['TransaksiPengeluaran']))
            $model->attributes = $_GET['TransaksiPengeluaran'];

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
        $model = TransaksiPengeluaran::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'transaksi-pengeluaran-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
    
    public function actionReport()
    {       
        Yii::import("ext.tcpdf.ETcPdf");
        
        $pdfGenerator = new ETcPdf("P", "mm", "A4", true, "UTF-8");
        $pdfGenerator->Open();
        $pdfGenerator->AddPage();
        
        $pdfGenerator->Image($_SERVER['SERVER_NAME'] . ($_SERVER['SERVER_PORT']==80?"":":" . $_SERVER['SERVER_PORT'])   . Yii::app()->request->baseUrl . "/images/images.jpg", "","");
        $pdfGenerator->Cell(210, 6, "MADRASAH MU'ALLIMIEN MUHAMMADIYAH",0,0,"C");
        $pdfGenerator->Ln();
        $pdfGenerator->Cell(210, 6, "LEUWILIANG KABUPATEN BOGOR",0,0,"C");
        $pdfGenerator->Ln();
        $pdfGenerator->Cell(210, 6, "Jl. Raya Leuwiliang No.106 Kabupaten Bogor 16640 Telp./Fax (0251) 8647619",0,0,"C");
        $pdfGenerator->Ln();
        $pdfGenerator->Cell(210, 6, "Web: www.muallimienbogor.sch.id |email: muallimienbgr@yahoo.co.id",0,0,"C");
        $pdfGenerator->Ln();
        $pdfGenerator->Ln();
        $pdfGenerator->Ln();
        $pdfGenerator->Cell(40, 6, "Tanggal", 1);
        $pdfGenerator->Cell(4, 6, ":", 1);
        $pdfGenerator->Cell(100, 6, "{Isi}", 1);
        $pdfGenerator->Ln();
        $pdfGenerator->Cell(40, 6, "Bulan", 1);
        $pdfGenerator->Cell(4, 6, ":", 1);
        $pdfGenerator->Cell(100, 6, "{Isi}", 1);
        $pdfGenerator->Ln();
        
        $tmp = $pdfGenerator->GetLineWidth();
        $pdfGenerator->Line(10,40,200,40, array('width'=>1));
        $pdfGenerator->SetLineWidth($tmp);
        
        $pdfGenerator->Cell(40, 6, "Tingkat Sekolah",1);
        $pdfGenerator->Cell(4, 6, ":", 1);
        $pdfGenerator->Cell(100, 6, "{Isi}", 1);
        $pdfGenerator->Ln();
        $pdfGenerator->Ln();
        $pdfGenerator->Cell(210, 6, "LAPORAN TRANSAKSI PEMASUKAN",0,0,"C");
        
        $pdfGenerator->Ln();
        $pdfGenerator->Ln();
        $pdfGenerator->Cell(40, 6, "Tanggal Transaksi", 1);
        $pdfGenerator->Cell(40, 6, "Ket Transaksi", 1);
        $pdfGenerator->Cell(20, 6, "Jumlah", 1);
        $pdfGenerator->Cell(40, 6, "Harga", 1);
        $pdfGenerator->Cell(40, 6, "Total Pemasukan", 1);
        $pdfGenerator->Ln();
        $pdfGenerator->Cell(40, 6, "", 1);
        $pdfGenerator->Cell(40, 6, "", 1);
        $pdfGenerator->Cell(20, 6, "", 1);
        $pdfGenerator->Cell(40, 6, "", 1);
        $pdfGenerator->Cell(40, 6, "", 1);
        $pdfGenerator->Ln();
        $pdfGenerator->Cell(40, 6, "", 1);
        $pdfGenerator->Cell(40, 6, "", 1);
        $pdfGenerator->Cell(20, 6, "", 1);
        $pdfGenerator->Cell(40, 6, "", 1);
        $pdfGenerator->Cell(40, 6, "", 1);
        $pdfGenerator->Ln();
        $pdfGenerator->Cell(40, 6, "", 1);
        $pdfGenerator->Cell(40, 6, "", 1);
        $pdfGenerator->Cell(20, 6, "", 1);
        $pdfGenerator->Cell(40, 6, "", 1);
        $pdfGenerator->Cell(40, 6, "", 1);
        $pdfGenerator->Ln();
        $pdfGenerator->Cell(40, 6, "", 1);
        $pdfGenerator->Cell(40, 6, "", 1);
        $pdfGenerator->Cell(20, 6, "", 1);
        $pdfGenerator->Cell(40, 6, "", 1);
        $pdfGenerator->Cell(40, 6, "", 1);
        $pdfGenerator->Ln();
        $pdfGenerator->Cell(40, 6, "", 1);
        $pdfGenerator->Cell(40, 6, "", 1);
        $pdfGenerator->Cell(20, 6, "", 1);
        $pdfGenerator->Cell(40, 6, "", 1);
        $pdfGenerator->Cell(40, 6, "", 1);
        $pdfGenerator->Ln();
        $pdfGenerator->Cell(40, 6, "", 1);
        $pdfGenerator->Cell(40, 6, "", 1);
        $pdfGenerator->Cell(20, 6, "", 1);
        $pdfGenerator->Cell(40, 6, "", 1);
        $pdfGenerator->Cell(40, 6, "", 1);
       
        $pdfGenerator->Ln();
        $pdfGenerator->Ln();
        $pdfGenerator->Cell(210, 6, "LAPORAN TRANSAKSI PENGELUARAN",0,0,"C");
        
        $pdfGenerator->Ln();
        $pdfGenerator->Ln();
        $pdfGenerator->Cell(40, 6, "Tanggal Transaksi", 1);
        $pdfGenerator->Cell(40, 6, "Ket Transaksi", 1);
        $pdfGenerator->Cell(20, 6, "Jumlah", 1);
        $pdfGenerator->Cell(40, 6, "Harga", 1);
        $pdfGenerator->Cell(40, 6, "Total Pengeluaran", 1);
        $pdfGenerator->Ln();
        $pdfGenerator->Cell(40, 6, "", 1);
        $pdfGenerator->Cell(40, 6, "", 1);
        $pdfGenerator->Cell(20, 6, "", 1);
        $pdfGenerator->Cell(40, 6, "", 1);
        $pdfGenerator->Cell(40, 6, "", 1);
        $pdfGenerator->Ln();
        $pdfGenerator->Cell(40, 6, "", 1);
        $pdfGenerator->Cell(40, 6, "", 1);
        $pdfGenerator->Cell(20, 6, "", 1);
        $pdfGenerator->Cell(40, 6, "", 1);
        $pdfGenerator->Cell(40, 6, "", 1);
        $pdfGenerator->Ln();
        $pdfGenerator->Cell(40, 6, "", 1);
        $pdfGenerator->Cell(40, 6, "", 1);
        $pdfGenerator->Cell(20, 6, "", 1);
        $pdfGenerator->Cell(40, 6, "", 1);
        $pdfGenerator->Cell(40, 6, "", 1);
        $pdfGenerator->Ln();
        $pdfGenerator->Cell(40, 6, "", 1);
        $pdfGenerator->Cell(40, 6, "", 1);
        $pdfGenerator->Cell(20, 6, "", 1);
        $pdfGenerator->Cell(40, 6, "", 1);
        $pdfGenerator->Cell(40, 6, "", 1);
        $pdfGenerator->Ln();
        $pdfGenerator->Cell(40, 6, "", 1);
        $pdfGenerator->Cell(40, 6, "", 1);
        $pdfGenerator->Cell(20, 6, "", 1);
        $pdfGenerator->Cell(40, 6, "", 1);
        $pdfGenerator->Cell(40, 6, "", 1);
        $pdfGenerator->Ln();
        $pdfGenerator->Cell(40, 6, "", 1);
        $pdfGenerator->Cell(40, 6, "", 1);
        $pdfGenerator->Cell(20, 6, "", 1);
        $pdfGenerator->Cell(40, 6, "", 1);
        $pdfGenerator->Cell(40, 6, "", 1);
       
        
        $pdfGenerator->Ln();
        
        $pdfGenerator->Ln();
        
        $pdfGenerator->Output();
    }

}
