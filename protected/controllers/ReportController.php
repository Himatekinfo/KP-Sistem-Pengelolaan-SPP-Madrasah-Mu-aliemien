<?php

class ReportController extends Controller {

	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout = '//layouts/column1';

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
				'actions' => array('admin', 'delete', 'create', 'update', 'transaksi', 'siswa'),
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

	private function printTransaksi($as, $day, $month) {
		$modelIn = StaticHelper::getReportTransaction(0, 0, 0, 0, false, "d");
		if ($as != "0") {
			$modelIn = StaticHelper::getReportTransaction($as, $day, $month, 0, false, "d");
		}
		$modelOut = StaticHelper::getReportTransaction(0, 0, 0, 0, false, "c");
		if ($as != "0") {
			$modelOut = StaticHelper::getReportTransaction($as, $day, $month, 0, false, "c");
		}

		Yii::import("ext.tcpdf.ETcPdf", true);
		$pdfGenerator = new ETcPdf("P", "mm", "A4", true, "UTF-8");
		$pdfGenerator->Open();
		$pdfGenerator->AddPage();

		//$pdfGenerator->Image($_SERVER['SERVER_NAME'] . Yii::app()->request->baseUrl . "/images/images.jpg", "", "");
		$pdfGenerator->Cell(210, 6, "MADRASAH MU'ALLIMIEN MUHAMMADIYAH", 0, 0, "C");
		$pdfGenerator->Ln();
		$pdfGenerator->Cell(210, 6, "LEUWILIANG KABUPATEN BOGOR", 0, 0, "C");
		$pdfGenerator->Ln();
		$pdfGenerator->Cell(210, 6, "Jl. Raya Leuwiliang No.106 Kabupaten Bogor 16640 Telp./Fax (0251) 8647619", 0, 0, "C");
		$pdfGenerator->Ln();
		$pdfGenerator->Cell(210, 6, "Web: www.muallimienbogor.sch.id |email: muallimienbgr@yahoo.co.id", 0, 0, "C");
		$pdfGenerator->Ln();
		$pdfGenerator->Ln();
		$pdfGenerator->Ln();
		$pdfGenerator->Cell(40, 6, "Tanggal", 1);
		$pdfGenerator->Cell(4, 6, ":", 1);
		$pdfGenerator->Cell(100, 6, $day, 1);
		$pdfGenerator->Ln();
		$pdfGenerator->Cell(40, 6, "Bulan", 1);
		$pdfGenerator->Cell(4, 6, ":", 1);
		$pdfGenerator->Cell(100, 6, $month, 1);
		$pdfGenerator->Ln();

		$tmp = $pdfGenerator->GetLineWidth();
		$pdfGenerator->Line(10, 40, 200, 40, array('width' => 1));
		$pdfGenerator->SetLineWidth($tmp);

		$pdfGenerator->Cell(40, 6, "Tingkat Sekolah", 1);
		$pdfGenerator->Cell(4, 6, ":", 1);
		$pdfGenerator->Cell(100, 6, "Madrasah Aliyah", 1);
		$pdfGenerator->Ln();
		$pdfGenerator->Ln();
		$pdfGenerator->Cell(210, 6, "LAPORAN TRANSAKSI PEMASUKAN", 0, 0, "C");

		$pdfGenerator->Ln();
		$pdfGenerator->Ln();
		$pdfGenerator->Cell(40, 6, "Tanggal Transaksi", 1);
		$pdfGenerator->Cell(40, 6, "Ket Transaksi", 1);
		$pdfGenerator->Cell(20, 6, "Jumlah", 1);
		$pdfGenerator->Cell(40, 6, "Harga", 1);
		$pdfGenerator->Cell(40, 6, "Total Pemasukan", 1);
		$pdfGenerator->Ln();

		$total = 0;
		foreach ($modelIn->getData() as $data) {
			$pdfGenerator->Cell(40, 6, $data['TransactionDate'], 1);
			$pdfGenerator->Cell(40, 6, $data['TransactionDescription'], 1);
			$pdfGenerator->Cell(20, 6, $data['ItemCount'], 1);
			$pdfGenerator->Cell(40, 6, $data['ItemPrice'], 1);
			$pdfGenerator->Cell(40, 6, $data['Debet'], 1);
			$pdfGenerator->Ln();
			$total += $data['Debet'];
		}
		$pdfGenerator->Cell(40, 6, "", 1);
		$pdfGenerator->Cell(40, 6, "", 1);
		$pdfGenerator->Cell(20, 6, "", 1);
		$pdfGenerator->Cell(40, 6, "Total", 1);
		$pdfGenerator->Cell(40, 6, $total, 1);
		$pdfGenerator->Ln();

		$pdfGenerator->Ln();
		$pdfGenerator->Ln();
		$pdfGenerator->Cell(210, 6, "LAPORAN TRANSAKSI PENGELUARAN", 0, 0, "C");

		$pdfGenerator->Ln();
		$pdfGenerator->Ln();
		$pdfGenerator->Cell(40, 6, "Tanggal Transaksi", 1);
		$pdfGenerator->Cell(50, 6, "Ket Transaksi", 1);
		$pdfGenerator->Cell(20, 6, "Jumlah", 1);
		$pdfGenerator->Cell(40, 6, "Harga", 1);
		$pdfGenerator->Cell(50, 6, "Total Pengeluaran", 1);
		$pdfGenerator->Ln();
		$total = 0;
		foreach ($modelOut->getData() as $data) {
			$pdfGenerator->Cell(40, 6, $data['TransactionDate'], 1);
			$pdfGenerator->Cell(50, 6, $data['TransactionDescription'], 1);
			$pdfGenerator->Cell(20, 6, $data['ItemCount'], 1);
			$pdfGenerator->Cell(40, 6, $data['ItemPrice'], 1);
			$pdfGenerator->Cell(50, 6, $data['Credit'], 1);
			$pdfGenerator->Ln();
			$total += $data['Credit'];
		}
		$pdfGenerator->Cell(40, 6, "", 1);
		$pdfGenerator->Cell(50, 6, "", 1);
		$pdfGenerator->Cell(20, 6, "", 1);
		$pdfGenerator->Cell(50, 6, "Total", 1);
		$pdfGenerator->Cell(50, 6, $total, 1);
		$pdfGenerator->Ln();

		$pdfGenerator->Ln();
		$pdfGenerator->Ln();

		$pdfGenerator->Output();
	}

	public function actionTransaksi() {
		$model = StaticHelper::getReportTransaction();
		$modelTotal = StaticHelper::getReportTransaction(0, 0, 0, 0, true);

		if (Yii::app()->request->isPostRequest) {
			$as = Yii::app()->request->getPost('as');
			$day = Yii::app()->request->getPost('day');
			$month = Yii::app()->request->getPost('month');
			if ($as != "0") {
				$model = StaticHelper::getReportTransaction($as, $day, $month);
				$modelTotal = StaticHelper::getReportTransaction($as, $day, $month, 0, true);
			}
			if (Yii::app()->request->getPost('yt1') == "Cetak") {
				spl_autoload_unregister(array('YiiBase', 'autoload'));
				$this->printTransaksi($as, $day, $month);
				spl_autoload_register(array('YiiBase', 'autoload'));
				return;
			}
		}

		$this->render('admin', array(
			'model' => $model,
			'modelTotal' => $modelTotal,
		));
	}

	public function actionSiswa() {
		$model = HistoryKelas::model()->findAll();

		if (Yii::app()->request->isPostRequest) {
			$kelas = Yii::app()->request->getPost('Kelas');
			$model = HistoryKelas::model()->findAll("KelasId=$kelas");
			if (Yii::app()->request->getPost('yt1') == "Cetak") {
				$this->printSiswa($model);
				return;
			}
		}

		$dataProvider = new CArrayDataProvider($model, array(
						'keyField' => 'Id'
					));

		$this->render('siswa', array(
			'model' => $dataProvider,
		));
	}

	private function printSiswa($model)
	{
		Yii::import("ext.tcpdf.ETcPdf", true);
		$pdfGenerator = new ETcPdf("P", "mm", "A4", true, "UTF-8");
		$pdfGenerator->Open();
		$pdfGenerator->AddPage();

		//$pdfGenerator->Image($_SERVER['SERVER_NAME'] . Yii::app()->request->baseUrl . "/images/images.jpg", "", "");
		$pdfGenerator->Cell(210, 6, "MADRASAH MU'ALLIMIEN MUHAMMADIYAH", 0, 0, "C");
		$pdfGenerator->Ln();
		$pdfGenerator->Cell(210, 6, "LEUWILIANG KABUPATEN BOGOR", 0, 0, "C");
		$pdfGenerator->Ln();
		$pdfGenerator->Cell(210, 6, "Jl. Raya Leuwiliang No.106 Kabupaten Bogor 16640 Telp./Fax (0251) 8647619", 0, 0, "C");
		$pdfGenerator->Ln();
		$pdfGenerator->Cell(210, 6, "Web: www.muallimienbogor.sch.id |email: muallimienbgr@yahoo.co.id", 0, 0, "C");
		$pdfGenerator->Ln();
		$pdfGenerator->Ln();

		$pdfGenerator->Cell(40, 6, "No Induk", 1);
		$pdfGenerator->Cell(40, 6, "NIS", 1);
		$pdfGenerator->Cell(20, 6, "Nama Siswa", 1);
		$pdfGenerator->Cell(40, 6, "Kelas", 1);
		$pdfGenerator->Cell(40, 6, "Jurusan", 1);
		$pdfGenerator->Cell(40, 6, "Tahun Ajaran", 1);
		$pdfGenerator->Ln();

		foreach ($model as $data) {
			$pdfGenerator->Cell(40, 6, $data->No_Induk, 1);
			$pdfGenerator->Cell(40, 6, $data->siswa->NIS, 1);
			$pdfGenerator->Cell(20, 6, $data->siswa->NamaSiswa, 1);
			$pdfGenerator->Cell(40, 6, $data->kelas->Kelas, 1);
			$pdfGenerator->Cell(40, 6, $data->jurusan->Jurusan, 1);
			$pdfGenerator->Cell(40, 6, $data->TahunAjaran, 1);
			$pdfGenerator->Ln();
		}

		$pdfGenerator->Ln();
		$pdfGenerator->Ln();
		$pdfGenerator->Output();
	}

}
