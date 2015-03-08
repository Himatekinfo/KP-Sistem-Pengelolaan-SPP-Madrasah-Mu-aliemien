<?php

/**
 * This is the model class for table "tbl_siswa".
 *
 * The followings are the available columns in table 'tbl_siswa':
 * @property string $No_Induk 
 * @property string $NIS
 * @property string $NamaSiswa
 * @property string $JK
 * @property string $TempatLahir
 * @property string $TanggalLahir
 * @property string $OrangTuaWali
 * @property string $Alamat
 *
 * The followings are the available model relations:
 * @property HistoryKelas[] $historyKelases
 * @property TransaksiSiswa[] $transaksiSiswas
 */
class Siswa extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Siswa the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tbl_siswa';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('No_Induk, NamaSiswa, JK, TempatLahir, TanggalLahir, Alamat', 'required'),
            array('No_Induk, NIS', 'length', 'max' => 15),
            array('RBL', 'length', 'max' => 50),
            array('NamaSiswa', 'length', 'max' => 30),
            array('JK', 'length', 'max' => 10),
            array('TempatLahir', 'length', 'max' => 20),
            array('Ayah', 'length', 'max' => 50),
            array('Ibu', 'length', 'max' => 50),
            array('Pekerjaan_ortu', 'length', 'max'=>30),
            array('Ekonomi', 'length', 'max'=>20),
            array('Alamat', 'length', 'max' => 200),
            array('No_STTB', 'length', 'max' => 200),
            array('Asal_Sekolah', 'length', 'max'=>200),
            
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('No_Induk, NIS, NamaSiswa, JK, TempatLahir, TanggalLahir, Ayah, Ibu, Alamat', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'historyKelases' => array(self::HAS_MANY, 'HistoryKelas', 'No_Induk'),
            'transaksiSiswas' => array(self::HAS_MANY, 'TransaksiSiswa', 'No_IndukSiswa'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'No_Induk'=>'No_Induk',
            'NIS' => 'Nis',
            'NamaSiswa' => 'Nama Siswa',
            'RBL' => 'RBL',
            'JK' => 'Jk',
            'TempatLahir' => 'Tempat Lahir',
            'TanggalLahir' => 'Tanggal Lahir',
            'Ayah' => 'Ayah',
            'Ibu' => 'Ibu',
            'Pekerjaan_ortu'=>'Pekerjaan_ortu',
            'Ekonomi'=>'Ekonomi',
            'Alamat' => 'Alamat',
            'No_STTB'=>'No_STTB',
            'Asal_Sekolah'=>'Asal_Sekolah',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;
        
        $criteria->compare('No_Induk', $this->No_Induk, true);
        $criteria->compare('NIS', $this->NIS, true);
        $criteria->compare('NamaSiswa', $this->NamaSiswa, true);
        $criteria->compare('RBL', $this->RBL, true);
        $criteria->compare('JK', $this->JK, true);
        $criteria->compare('TempatLahir', $this->TempatLahir, true);
        $criteria->compare('TanggalLahir', $this->TanggalLahir, true);
        $criteria->compare('Ayah', $this->Ayah, true);
        $criteria->compare('Ibu', $this->Ibu, true);
        $criteria->compare('Pekerjaan_ortu', $this->Pekerjaan_ortu, true);
        $criteria->compare('Ekonomi', $this->Ekonomi, true);
        $criteria->compare('Alamat', $this->Alamat, true);
        $criteria->compare('No_STTB', $this->No_STTB, true);
        $criteria->compare('Asal_Sekolah', $this->Asal_Sekolah, true);


        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

	public function defaultScope()
	{
		return array(
			'join'=>'INNER JOIN tbl_history_kelas historyKelases ON t.No_Induk=historyKelases.No_Induk',
			'condition'=>'historyKelases.SekolahId=' . Yii::app()->user->getState("SekolahId")
		);
	}

}