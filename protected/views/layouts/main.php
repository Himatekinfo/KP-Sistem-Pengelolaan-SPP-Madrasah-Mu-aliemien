<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />

        <!-- blueprint CSS framework -->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
        <!--[if lt IE 8]>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
        <![endif]-->

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>

    <body>

        <div class="container" id="page">
        <?php echo CHtml::encode(Yii::app()->name); ?></div>
        <?php $this->widget('application.extensions.seqimage.SeqImage',array(
       'widthImage'=>1050,
       'heightImage'=>260,
       
        'slides'=>array(
            array(
                'image'=>array('src'=>Yii::app()->request->baseUrl.'/images/image1.jpg'),
                'link'=>array('url'=>'index.php','htmlOptions'=>array())
                ),
            array(
           'image'=>array('src'=>Yii::app()->request->baseUrl.'/images/image2.jpg'),            
       ),
      array(
           'image'=>array('src'=>Yii::app()->request->baseUrl.'/images/image5.jpg'),            
       )
  )));
    ?> 
                
            <div id="header">
            <div id="logo">
               
            </div><!-- header -->
            
            <div id="">
                <?php $this->widget('application.extensions.emenu.EMenu',array( //ext.superfish.RSuperfish
                        'theme'=>'vimeo',
			'items'=>array(
			array('label'=>'Beranda', 'url'=>array('/site/index')),
                        array('label' => 'Data Siswa', 'url' => array('/report/siswa'), 'visible' => !Yii::app()->user->isGuest && Yii::app()->user->getState('AsAdmin'), 'items' => array(
                            array('label' => 'Daftar Siswa Baru', 'url' => array('/siswa/create'), 'visible' => !Yii::app()->user->isGuest),
                            array('label' => 'Daftar Ulang Siswa lama', 'url' => array('/HistoryKelas/create'), 'visible' => !Yii::app()->user->isGuest),
                        )),         
                        array('label' => 'Data master', 'url' => '', 'visible' => !Yii::app()->user->isGuest && Yii::app()->user->getState('AsAdmin'), 'items' => array(
                                array('label' => 'Satuan', 'url' => array('/satuan/admin'), 'visible' => !Yii::app()->user->isGuest),
                                array('label' => 'Jenis Transaksi', 'url' => array('/jnstransaksi/admin'), 'visible' => !Yii::app()->user->isGuest),
                                array('label' => 'Sekolah', 'url' => array('/sekolah/admin'), 'visible' => !Yii::app()->user->isGuest),
                                array('label' => 'Jurusan', 'url' => array('/jurusan/admin'), 'visible' => !Yii::app()->user->isGuest),
                                array('label' => 'Kelas', 'url' => array('/kelas/admin'), 'visible' => !Yii::app()->user->isGuest),
                                array('label' => 'PeriodeBayar', 'url' => array('/PeriodeBayar/admin'), 'visible' => !Yii::app()->user->isGuest),
                        )),
                        array('label'=> 'Data Transaksi', 'url' =>'','visible'=> !Yii::app()->user->isGuest && Yii::app()->user->getState('AsAdmin'), 'items' => array(
                                array('label' => 'Transaksi Siswa', 'url' => array('/transaksisiswa/create'), 'visible' => !Yii::app()->user->isGuest),
                                array('label' => 'Transaksi Pengeluaran', 'url' => array('/transaksipengeluaran/create', 'view' => 'about'), 'visible' => !Yii::app()->user->isGuest),
                             )),    
                        array('label' => 'Report Transaksi', 'url' => array('/report/transaksi'), 'visible' => !Yii::app()->user->isGuest),
                        
                        array('label' => 'Login', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
                        array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest, 'items'=> array(
							array('label' => 'Change Password', 'url' => array('/user/changepassword'), 'visible' => !Yii::app()->user->isGuest),
						)),
                    ),
                ));
                ?>
            </div><!-- mainmenu -->
            <?php if (isset($this->breadcrumbs)): ?>
                <?php
                $this->widget('zii.widgets.CBreadcrumbs', array(
                    'links' => $this->breadcrumbs,
                ));
                ?><!-- breadcrumbs -->
            <?php endif ?>

            <?php echo $content; ?>

            <div class="clear"></div>

            <div id="footer">
                Copyright &copy; <?php echo date('Y'); ?> by Dian--Azmi.<br/>
                All Rights Reserved.<br/>

            </div><!-- footer -->

        </div><!-- page -->

    </body>
</html>
