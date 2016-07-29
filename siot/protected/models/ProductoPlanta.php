<?php

/**
 * This is the model class for table "producto_planta".
 *
 * The followings are the available columns in table 'producto_planta':
 * @property integer $id_producto_planta
 * @property integer $producto_id
 * @property integer $planta_id
 * @property integer $activo
 *
 * The followings are the available model relations:
 * @property Productos $producto
 * @property Plantas $planta
 */
class ProductoPlanta extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'producto_planta';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('producto_id, planta_id', 'required'),
			array('producto_id, planta_id, activo', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_producto_planta, producto_id, planta_id, activo', 'safe', 'on'=>'search'),
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
			'producto' => array(self::BELONGS_TO, 'Productos', 'producto_id'),
			'planta' => array(self::BELONGS_TO, 'Plantas', 'planta_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_producto_planta' => 'Id Producto Planta',
			'producto_id' => 'Producto',
			'planta_id' => 'Planta',
			'activo' => 'Activo',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_producto_planta',$this->id_producto_planta);
		$criteria->compare('producto_id',$this->producto_id);
		$criteria->compare('planta_id',$this->planta_id);
		$criteria->compare('activo',$this->activo);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ProductoPlanta the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
