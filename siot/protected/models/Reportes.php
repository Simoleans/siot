<?php

/**
 * This is the model class for table "reportes".
 *
 * The followings are the available columns in table 'reportes':
 * @property integer $id_reporte
 * @property integer $usuario_id
 * @property integer $producto_id
 * @property string $produccion
 * @property string $descripcion
 * @property string $fecha_reporte
 *
 * The followings are the available model relations:
 * @property Usuarios $usuario
 * @property Productos $producto
 */
class Reportes extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'reportes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('producto_id', 'required'),
			array('produccion', 'required'),
			array('usuario_id, producto_id', 'numerical', 'integerOnly'=>true),
			array('produccion', 'length', 'max'=>10),
			array('descripcion', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_reporte, usuario_id, producto_id, produccion, descripcion, fecha_reporte', 'safe', 'on'=>'search'),
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
			'usuario' => array(self::BELONGS_TO, 'Usuarios', 'usuario_id'),
			'producto' => array(self::BELONGS_TO, 'Productos', 'producto_id'),
			'plantas' => array(self::BELONGS_TO, 'Plantas', 'nombre_planta'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_reporte' => 'ID',
			'usuario_id' => 'Usuario',
			'producto_id' => 'Producto',
			'produccion' => 'Producción',
			'descripcion' => 'Descripcion',
			'fecha_reporte' => 'Fecha de Reporte',
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

		$criteria->compare('id_reporte',$this->id_reporte);
		$criteria->compare('usuario_id',$this->usuario_id);
		$criteria->compare('producto_id',$this->producto_id);
		$criteria->compare('produccion',$this->produccion,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('fecha_reporte',$this->fecha_reporte,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Reportes the static model class
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
