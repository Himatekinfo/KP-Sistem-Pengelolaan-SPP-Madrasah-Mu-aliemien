<?php

/**
 * This is the model class for table "tbl_transaksi_pengeluaran".
 *
 * The followings are the available columns in table 'tbl_transaksi_pengeluaran':
 * @property string $Id
 * @property string $UserId
 * @property string $Deskripsi
 * @property string $Tanggal
 * @property string $Ket
 * @property string $JumlahBenda
 * @property string $HargaSatuan
 * @property string $SatuanId
 *
 * The followings are the available model relations:
 * @property Satuan $satuan
 * @property User $user
 */
class TransaksiPengeluaran extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TransaksiPengeluaran the static model class
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
		return 'tbl_transaksi_pengeluaran';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('UserId, Deskripsi, Tanggal, Ket, JumlahBenda, HargaSatuan, SatuanId', 'required'),
			array('UserId', 'length', 'max'=>5),
			array('Deskripsi, Ket', 'length', 'max'=>200),
			array('JumlahBenda, SatuanId', 'length', 'max'=>10),
			array('HargaSatuan', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Id, UserId, Deskripsi, Tanggal, Ket, JumlahBenda, HargaSatuan, SatuanId', 'safe', 'on'=>'search'),
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
			'satuan' => array(self::BELONGS_TO, 'Satuan', 'SatuanId'),
			'user' => array(self::BELONGS_TO, 'User', 'UserId'),
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
			'Deskripsi' => 'Deskripsi',
			'Tanggal' => 'Tanggal',
			'Ket' => 'Ket',
			'JumlahBenda' => 'Jumlah Benda',
			'HargaSatuan' => 'Harga Satuan',
			'SatuanId' => 'Satuan',
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
		$criteria->compare('Deskripsi',$this->Deskripsi,true);
		$criteria->compare('Tanggal',$this->Tanggal,true);
		$criteria->compare('Ket',$this->Ket,true);
		$criteria->compare('JumlahBenda',$this->JumlahBenda,true);
		$criteria->compare('HargaSatuan',$this->HargaSatuan,true);
		$criteria->compare('SatuanId',$this->SatuanId,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}