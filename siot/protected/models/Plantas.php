<?php

/**
 * This is the model class for table "plantas".
 *
 * The followings are the available columns in table 'plantas':
 * @property integer $id_planta
 * @property string $nombre_planta
 * @property integer $tipo_id
 * @property string $empresa_id
 * @property integer $estado_id
 * @property integer $municipio_id
 * @property integer $parroquia_id
 * @property string $descripcion
 * @property integer $cap_inst
 * @property integer $cap_ope
 * @property integer $cap_alm
 * @property integer $alm_seco
 * @property integer $alm_frio
 * @property integer $alm_silo
 * @property integer $cant_lineas
 * @property integer $estatus_lineas
 * @property integer $cant_empleados
 * @property string $longitud
 * @property string $latitud
 * @property integer $activo
 *
 * The followings are the available model relations:
 * @property TipoPlanta $tipo
 * @property Empresa $empresa
 * @property Estado $estado
 * @property Municipio $municipio
 * @property Parroquia $parroquia
 */
class Plantas extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'plantas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre_planta', 'required'),
			array('nombre_planta', 'unique'),
			array('empresa_id', 'required'),
			array('tipo_id', 'required'),
			array('estado_id','required'),
			array('municipio_id', 'required'),
			array('parroquia_id', 'required'),
			array('cant_empleados', 'length', 'min'=>2, 'max'=>4),
			array('estado_id, municipio_id, parroquia_id, cap_inst, cap_ope, cap_alm, alm_seco, alm_frio, alm_silo, cant_lineas, estatus_lineas, cant_empleados, activo', 'numerical', 'integerOnly'=>true),
			array('nombre_planta, longitud, latitud', 'length', 'max'=>255),
			array('empresa_id', 'length', 'max'=>11),
			array('descripcion', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_planta, nombre_planta, tipo_id, empresa_id, estado_id, municipio_id, parroquia_id, descripcion, cap_inst, cap_ope, cap_alm, alm_seco, alm_frio, alm_silo, cant_lineas, estatus_lineas, cant_empleados, longitud, latitud, activo', 'safe', 'on'=>'search'),
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
			'tipo' => array(self::BELONGS_TO, 'TipoPlanta', 'tipo_id'),
			'empresa' => array(self::BELONGS_TO, 'Empresa', 'empresa_id'),
			'estado' => array(self::BELONGS_TO, 'Estado', 'estado_id'),
			'municipio' => array(self::BELONGS_TO, 'Municipio', 'municipio_id'),
			'parroquia' => array(self::BELONGS_TO, 'Parroquia', 'parroquia_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_planta' => 'ID',
			'nombre_planta' => 'Planta',
			'tipo_id' => 'Tipo de Planta',
			'empresa_id' => 'Empresa ',
			'estado_id' => 'Estado',
			'municipio_id' => 'Municipio',
			'parroquia_id' => 'Parroquia',
			'descripcion' => 'Descripción',
			'cap_inst' => 'Capacidad Instalada',
			'cap_ope' => 'Capacidad Operativa',
			'cap_alm' => 'Capacidad de Almacenamiento',
			'alm_seco' => 'Almacenamiento en Seco',
			'alm_frio' => 'Almacenamiento en Frio',
			'alm_silo' => 'Almacenamiento en Silo',
			'cant_lineas' => 'Cant. de Lineas',
			'estatus_lineas' => 'Operativas',
			'cant_empleados' => 'N° Empleados',
			'longitud' => 'Longitud',
			'latitud' => 'Latitud',
			'activo' => 'Planta Activa',
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

		$criteria->compare('id_planta',$this->id_planta);
		$criteria->compare('nombre_planta',$this->nombre_planta,true);
		
		
		//$criteria->compare('tipo_id',$this->tipo_id);
		
		//$criteria->with =array('tipo');
		//$criteria->addSearchCondition('tipo.nombre_tipo', $this->tipo_id);
	
		$criteria->compare('empresa_id',$this->empresa_id,true);	
		
		//$criteria->compare('estado_id',$this->estado_id);
		
		$criteria->with =array('estado');
		$criteria->addSearchCondition('estado.estado', $this->estado_id);			
		
		$criteria->compare('municipio_id',$this->municipio_id);			
		
		$criteria->compare('parroquia_id',$this->parroquia_id);		
		
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('cap_inst',$this->cap_inst);
		$criteria->compare('cap_ope',$this->cap_ope);
		$criteria->compare('cap_alm',$this->cap_alm);
		$criteria->compare('alm_seco',$this->alm_seco);
		$criteria->compare('alm_frio',$this->alm_frio);
		$criteria->compare('alm_silo',$this->alm_silo);
		$criteria->compare('cant_lineas',$this->cant_lineas);
		$criteria->compare('estatus_lineas',$this->estatus_lineas);
		$criteria->compare('cant_empleados',$this->cant_empleados);
		$criteria->compare('longitud',$this->longitud,true);
		$criteria->compare('latitud',$this->latitud,true);
		$criteria->compare('activo',$this->activo);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Plantas the static model class
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
