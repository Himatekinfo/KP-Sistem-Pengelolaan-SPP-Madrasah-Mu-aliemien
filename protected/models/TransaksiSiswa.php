<?php

/**
 * This is the model class for table "tbl_transaksi_siswa".
 *
 * The followings are the available columns in table 'tbl_transaksi_siswa':
 * @property string $Id
 * @property string $UserId
 * @property string $JnstransaksiId
 * @property string $No_IndukSiswa
 * @property string $TanggalTransaksi
 * @property string $Jumlah
 *
 * The followings are the available model relations:
 * @property Siswa $No_IndukSiswa
 * @property User $user
 * @property JnsTransaksi $jnstransaksi
 */
class TransaksiSiswa extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TransaksiSiswa the static model class
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
		return 'tbl_transaksi_siswa';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('UserId, JnstransaksiId, No_IndukSiswa, TanggalTransaksi, Jumlah', 'required'),
			array('UserId, JnstransaksiId', 'length', 'max'=>5),
			array('No_IndukSiswa', 'length', 'max'=>15),
			array('Jumlah', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Id, UserId, JnstransaksiId, No_IndukSiswa, TanggalTransaksi, Jumlah', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'No_Induk' => array(self::BELONGS_TO, 'Siswa', 'No_IndukSiswa'),
			'user' => array(self::BELONGS_TO, 'User', 'UserId'),
			'jnstransaksi' => array(self::BELONGS_TO, 'JnsTransaksi', 'JnstransaksiId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Id' => 'ID',
			'UserId' => 'User',
			'JnstransaksiId' => 'Jnstransaksi',
			'No_IndukSiswa' => 'No_IndukSiswa',
			'TanggalTransaksi' => 'Tanggal Transaksi',
			'Jumlah' => 'Jumlah',
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
		$criteria->compare('UserId',$this->UserId,true);
		$criteria->compare('JnstransaksiId',$this->JnstransaksiId,true);
		$criteria->compare('No_IndukSiswa',$this->No_IndukSiswa,true);
		$criteria->compare('TanggalTransaksi',$this->TanggalTransaksi,true);
		$criteria->compare('Jumlah',$this->Jumlah,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}