<?php

/**
 * This is the model class for table "productos".
 *
 * The followings are the available columns in table 'productos':
 * @property integer $id_producto
 * @property string $nombre_producto
 * @property integer $rubro_id
 * @property string $marca_id
 * @property integer $presentacion_id
 *
 * The followings are the available model relations:
 * @property Marcas $marca
 * @property Presentacion $presentacion
 * @property Rubros $rubro
 */
class Productos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'productos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre_producto', 'required'),
			array('nombre_producto', 'unique'),
			array('rubro_id', 'required'),
			array('marca_id', 'required'),
			array('presentacion_id', 'required'),
			array('rubro_id, presentacion_id', 'numerical', 'integerOnly'=>true),
			array('nombre_producto', 'length', 'max'=>255),
			array('marca_id', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_producto, nombre_producto, rubro_id, marca_id, presentacion_id', 'safe', 'on'=>'search'),
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
			'marca' => array(self::BELONGS_TO, 'Marcas', 'marca_id'),
			'presentacion' => array(self::BELONGS_TO, 'Presentacion', 'presentacion_id'),
			'rubro' => array(self::BELONGS_TO, 'Rubros', 'rubro_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_producto' => 'ID',
			'nombre_producto' => 'Producto',
			'rubro_id' => 'Rubro',
			'marca_id' => 'Marca',
			'presentacion_id' => 'Presentacion',
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

		$criteria->compare('id_producto',$this->id_producto);
		$criteria->compare('nombre_producto',$this->nombre_producto,true);
		$criteria->with =array('rubro');
		$criteria->addSearchCondition('rubro.nombre_rubro', $this->rubro_id);
		$criteria->with =array('marca');
		$criteria->addSearchCondition('marca.nombre_marca', $this->marca_id);		
		$criteria->with =array('presentacion');
		$criteria->addSearchCondition('presentacion.nombre_presentacion', $this->presentacion_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Productos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    protected function beforeSave(){

        //TODOS LOS ATRIBUTOS    
        $this->attributes = array_map('strtoupper',$this->attributes);

        return parent::beforeSave();
    }	
	
}
