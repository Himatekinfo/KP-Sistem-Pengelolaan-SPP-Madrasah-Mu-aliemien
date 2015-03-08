
<?php

/**
 * This is the model class for table "tbl_user".
 *
 * The followings are the available columns in table 'tbl_user':
 * @property string $Id
 * @property string $UserName
 * @property string $Password
 *
 * The followings are the available model relations:
 * @property TransaksiPengeluaran[] $transaksiPengeluarans
 * @property TransaksiSiswa[] $transaksiSiswas
 */
class User extends CActiveRecord
{
	public $password_verify;

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
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
		return 'tbl_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('UserName, Password', 'required'),
			array('UserName, Password', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Id, UserName, Password', 'safe', 'on'=>'search'),
			array('Password, password_verify', 'required', 'on'=>'changePass'),
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
			'transaksiPengeluarans' => array(self::HAS_MANY, 'TransaksiPengeluaran', 'UserId'),
			'transaksiSiswas' => array(self::HAS_MANY, 'TransaksiSiswa', 'UserId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Id' => 'ID',
			'UserName' => 'User Name',
			'Password' => 'Password',
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
		$criteria->compare('UserName',$this->UserName,true);
		$criteria->compare('Password',$this->Password,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}