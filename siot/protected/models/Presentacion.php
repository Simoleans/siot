<?php

/**
 * This is the model class for table "presentacion".
 *
 * The followings are the available columns in table 'presentacion':
 * @property integer $id_presentacion
 * @property string $nombre_presentacion
 * @property integer $contenido
 * @property string $medida_id
 *
 * The followings are the available model relations:
 * @property Medida $medida
 */
class Presentacion extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'presentacion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre_presentacion', 'required'),
			
			array('contenido', 'required'),
			array('medida_id', 'required'),
			array('contenido', 'numerical', 'integerOnly'=>true),
			array('nombre_presentacion', 'length', 'max'=>255),
			array('medida_id', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_presentacion, nombre_presentacion, contenido, medida_id', 'safe', 'on'=>'search'),
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
			'medida' => array(self::BELONGS_TO, 'Medida', 'medida_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_presentacion' => 'ID',
			'nombre_presentacion' => 'Presentación',
			'contenido' => 'Contenido',
			'medida_id' => 'Medida',
			'medida.abv_medida' => 'Medida',
			
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

		$criteria->compare('id_presentacion',$this->id_presentacion);
		$criteria->compare('nombre_presentacion',$this->nombre_presentacion,true);
		$criteria->compare('contenido',$this->contenido);
		$criteria->with =array('medida');
		$criteria->addSearchCondition('medida.nombre_medida', $this->medida_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Presentacion the static model class
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
