<?php

/**
 * This is the model class for table "tbl_jns_transaksi".
 *
 * The followings are the available columns in table 'tbl_jns_transaksi':
 * @property string $JnstransaksiId
 * @property string $NamaJnsTransaksi
 * @property integer $BisaCicil
 * @property string $PeriodeBayarId
 * @property string $JumlahPembayaran
 *
 * The followings are the available model relations:
 * @property PeriodeBayar $periodeBayar
 * @property TransaksiSiswa[] $transaksiSiswas
 */
class JnsTransaksi extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return JnsTransaksi the static model class
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
		return 'tbl_jns_transaksi';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('NamaJnsTransaksi, PeriodeBayarId, JumlahPembayaran', 'required'),
			array('BisaCicil', 'numerical', 'integerOnly'=>true),
			array('NamaJnsTransaksi', 'length', 'max'=>20),
			array('PeriodeBayarId, JumlahPembayaran', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('JnstransaksiId, NamaJnsTransaksi, BisaCicil, PeriodeBayarId, JumlahPembayaran', 'safe', 'on'=>'search'),
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
			'periodeBayar' => array(self::BELONGS_TO, 'PeriodeBayar', 'PeriodeBayarId'),
			'transaksiSiswas' => array(self::HAS_MANY, 'TransaksiSiswa', 'JnstransaksiId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'JnstransaksiId' => 'Jnstransaksi',
			'NamaJnsTransaksi' => 'Nama Jns Transaksi',
			'BisaCicil' => 'Bisa Cicil',
			'PeriodeBayarId' => 'Periode Bayar',
			'JumlahPembayaran' => 'Jumlah Pembayaran',
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

		$criteria->compare('JnstransaksiId',$this->JnstransaksiId,true);
		$criteria->compare('NamaJnsTransaksi',$this->NamaJnsTransaksi,true);
		$criteria->compare('BisaCicil',$this->BisaCicil);
		$criteria->compare('PeriodeBayarId',$this->PeriodeBayarId,true);
		$criteria->compare('JumlahPembayaran',$this->JumlahPembayaran,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
