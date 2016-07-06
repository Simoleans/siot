<?php

/**
 * This is the model class for table "usuarios".
 *
 * The followings are the available columns in table 'usuarios':
 * @property integer $id_usuario
 * @property integer $perfil_id
 * @property string $empresa_id
 * @property integer $planta_id
 * @property integer $sede_id
 * @property integer $gerencia_id
 * @property integer $cedula
 * @property string $nombre
 * @property string $apellido
 * @property string $usuario
 * @property string $contraseña
 * @property string $fecha_nac
 * @property string $correo
 * @property string $telefono
 * @property integer $activo
 * @property string $fecha_registro
 *
 * The followings are the available model relations:
 * @property Perfiles $perfil
 * @property Empresa $empresa
 */
class Usuarios extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'usuarios';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('perfil_id, planta_id, sede_id, gerencia_id, cedula, activo', 'numerical', 'integerOnly'=>true),
			array('empresa_id', 'length', 'max'=>10),
			array('nombre, apellido, usuario, contraseña, correo, telefono', 'length', 'max'=>255),
			array('fecha_nac', 'length', 'max'=>10),
			array('correo', 'unique'),
			array('correo','email'),
			array('nombre, apellido, usuario, contraseña, correo, telefono', 'required'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_usuario, perfil_id, empresa_id, planta_id, sede_id, gerencia_id, cedula, nombre, apellido, usuario, contraseña, fecha_nac, correo, telefono, activo, fecha_registro', 'safe', 'on'=>'search'),
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
			'perfil' => array(self::BELONGS_TO, 'Perfiles', 'perfil_id'),
			'empresa' => array(self::BELONGS_TO, 'Empresa', 'empresa_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_usuario' => 'Id Usuario',
			'perfil_id' => 'Perfil',
			'empresa_id' => 'Empresa',
			'planta_id' => 'Planta',
			'sede_id' => 'Sede',
			'gerencia_id' => 'Gerencia',
			'cedula' => 'Cédula',
			'nombre' => 'Nombre',
			'apellido' => 'Apellido',
			'usuario' => 'Usuario',
			'contraseña' => 'Contraseña',
			'fecha_nac' => 'Fecha Nac',
			'correo' => 'Correo',
			'telefono' => 'Telefono',
			'activo' => 'Activo',
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

		$criteria->compare('id_usuario',$this->id_usuario);
		$criteria->compare('perfil_id',$this->perfil_id);
		$criteria->compare('empresa_id',$this->empresa_id,true);
		$criteria->compare('planta_id',$this->planta_id);
		$criteria->compare('sede_id',$this->sede_id);
		$criteria->compare('gerencia_id',$this->gerencia_id);
		$criteria->compare('cedula',$this->cedula);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('apellido',$this->apellido,true);
		$criteria->compare('usuario',$this->usuario,true);
		$criteria->compare('contraseña',$this->contraseña,true);
		$criteria->compare('fecha_nac',$this->fecha_nac,true);
		$criteria->compare('correo',$this->correo,true);
		$criteria->compare('telefono',$this->telefono,true);
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
	 * @return Usuarios the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function validatePassword($password)
	{
		return $this->hashPassword($password)===$this->contraseña;
	}
	
	public function hashPassword($password)
	{
		return md5($password);
	}

}
