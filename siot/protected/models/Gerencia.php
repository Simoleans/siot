<?php

/**
 * This is the model class for table "gerencia".
 *
 * The followings are the available columns in table 'gerencia':
 * @property string $id_gerencia
 * @property string $sede_id
 * @property string $nombre_gerencia
 * @property string $gerente
 * @property string $ubicacion
 * @property integer $activo
 * @property string $fecha_registro
 *
 * The followings are the available model relations:
 * @property Sede $sede
 */
class Gerencia extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'gerencia';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('activo', 'numerical', 'integerOnly'=>true),
			array('sede_id', 'length', 'max'=>10),
			array('nombre_gerencia', 'length', 'max'=>100),
			array('gerente', 'length', 'max'=>50),
			array('ubicacion, fecha_registro', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_gerencia, sede_id, nombre_gerencia, gerente, ubicacion, activo, fecha_registro', 'safe', 'on'=>'search'),
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
			'sede' => array(self::BELONGS_TO, 'Sede', 'sede_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_gerencia' => 'Id Gerencia',
			'sede_id' => 'Sede',
			'nombre_gerencia' => 'Nombre Gerencia',
			'gerente' => 'Gerente',
			'ubicacion' => 'Ubicacion',
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

		$criteria->compare('id_gerencia',$this->id_gerencia,true);
		$criteria->with =array('sede');
		$criteria->addSearchCondition('sede.nombre', $this->sede_id);
		$criteria->compare('nombre_gerencia',$this->nombre_gerencia,true);
		$criteria->compare('gerente',$this->gerente,true);
		$criteria->compare('ubicacion',$this->ubicacion,true);
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
	 * @return Gerencia the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
