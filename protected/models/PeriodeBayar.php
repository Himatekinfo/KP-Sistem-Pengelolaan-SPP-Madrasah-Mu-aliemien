<?php

/**
 * This is the model class for table "tbl_periode_bayar".
 *
 * The followings are the available columns in table 'tbl_periode_bayar':
 * @property string $Id
 * @property string $PeriodeBayar
 *
 * The followings are the available model relations:
 * @property JnsTransaksi[] $jnsTransaksis
 */
class PeriodeBayar extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PeriodeBayar the static model class
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
		return 'tbl_periode_bayar';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('PeriodeBayar', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Id, PeriodeBayar', 'safe', 'on'=>'search'),
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
			'jnsTransaksis' => array(self::HAS_MANY, 'JnsTransaksi', 'PeriodeBayarId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Id' => 'ID',
			'PeriodeBayar' => 'Periode Bayar',
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
		$criteria->compare('PeriodeBayar',$this->PeriodeBayar,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}