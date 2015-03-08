<?php

/**
 * This is the model class for table "tbl_history_kelas".
 *
 * The followings are the available columns in table 'tbl_history_kelas':
 * @property string $Id
 * @property string $No_Induk
 * @property string $NIS
 * @property string $KelasId
 * @property string $SekolahId
 * @property string $JurusanId
 * @property string $TahunAjaran
 *
 * The followings are the available model relations:
 * @property Siswa $nIS
 * @property string $No_Induk
 * @property Kelas $kelas
 * @property Sekolah $sekolah
 * @property Jurusan $jurusan
 */
class HistoryKelas extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return HistoryKelas the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_history_kelas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('No_Induk, KelasId, SekolahId, JurusanId, TahunAjaran', 'required'),
			array('No_Induk', 'length', 'max'=>15),
			array('KelasId, SekolahId, JurusanId', 'length', 'max'=>5),
			array('TahunAjaran', 'length', 'max'=>4),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Id, No_Induk, KelasId, SekolahId, JurusanId, TahunAjaran', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: untuk merubah 
		// class name for the relations automatically generated below.
		return array(
			'siswa' => array(self::BELONGS_TO, 'Siswa', 'No_Induk'),
			'kelas' => array(self::BELONGS_TO, 'Kelas', 'KelasId'),
			'sekolah' => array(self::BELONGS_TO, 'Sekolah', 'SekolahId'),
			'jurusan' => array(self::BELONGS_TO, 'Jurusan', 'Id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Id' =>'ID',
                        'No_Induk'=>'No_Induk',
			'KelasId' => 'Kelas',
			'SekolahId' => 'Sekolah',
			'JurusanId' => 'Jurusan',
			'TahunAjaran' => 'Tahun Ajaran',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('Id',$this->Id,true);
                $criteria->compare('No_Induk',$this->No_Induk,true);
		$criteria->compare('KelasId',$this->KelasId,true);
		$criteria->compare('SekolahId',$this->SekolahId,true);
		$criteria->compare('JurusanId',$this->JurusanId,true);
		$criteria->compare('TahunAjaran',$this->TahunAjaran,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function defaultScope()
	{
		return array(
			'condition'=>'SekolahId=' . Yii::app()->user->getState("SekolahId")
		);
	}
}