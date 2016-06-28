<?php

/**
 * This is the model class for table "empresa".
 *
 * The followings are the available columns in table 'empresa':
 * @property string $id_empresa
 * @property string $razon_social
 * @property string $rif
 * @property string $direccion
 * @property string $telefono
 * @property string $contacto
 * @property string $correo
 * @property integer $activo
 * @property string $fecha_registro
 *
 * The followings are the available model relations:
 * @property Plantas[] $plantas
 * @property Sede[] $sedes
 */
class Empresa extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'empresa';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('razon_social', 'required'),
			array('telefono', 'required'),
			array('contacto', 'required'),
			array('activo', 'numerical', 'integerOnly'=>true),
			array('razon_social, contacto', 'length', 'max'=>100),
			array('rif', 'length', 'max'=>12),
			array('telefono', 'length', 'max'=>20),
			array('correo', 'length', 'max'=>50),
			array('direccion, fecha_registro', 'safe'),
			array('razon_social, rif, contacto, correo','unique'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_empresa, razon_social, rif, direccion, telefono, contacto, correo, activo, fecha_registro', 'safe', 'on'=>'search'),
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
			'plantas' => array(self::HAS_MANY, 'Plantas', 'empresa_id'),
			'sedes' => array(self::HAS_MANY, 'Sede', 'empresa_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_empresa' => 'ID',
			'razon_social' => 'Empresa',
			'rif' => 'RIF',
			'direccion' => 'Direccion',
			'telefono' => 'Telefono',
			'contacto' => 'Contacto',
			'correo' => 'Correo',
			'activo' => 'Empresa Activa',
			'fecha_registro' => 'Fecha Registro',
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

		$criteria->compare('id_empresa',$this->id_empresa,true);
		$criteria->compare('razon_social',$this->razon_social,true);
		$criteria->compare('rif',$this->rif,true);
		$criteria->compare('direccion',$this->direccion,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('contacto',$this->contacto,true);
		$criteria->compare('correo',$this->correo,true);
		$criteria->compare('activo',$this->activo);
		$criteria->compare('fecha_registro',$this->fecha_registro,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Empresa the static model class
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
