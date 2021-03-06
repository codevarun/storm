<?php

/**
 * This is the model class for table "regions".
 *
 * The followings are the available columns in table 'regions':
 * @property string $id
 * @property string $country_id
 * @property integer $active
 * @property string $title
 * @property string $latin
 *
 * The followings are the available model relations:
 * @property District[] $districts
 * @property OrderDetail[] $orderDetails
 * @property Country $country
 */
class Region extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @return Region the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'regions';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id, country_id', 'required'),
            array('active', 'numerical', 'integerOnly' => true),
            array('id, country_id', 'length', 'max' => 11),
            array('title, latin', 'length', 'max' => 250),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, country_id, active, title, latin', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'districts' => array(self::HAS_MANY, 'District', 'region_id'),
            'orderDetails' => array(self::HAS_MANY, 'OrderDetail', 'region_id'),
            'country' => array(self::BELONGS_TO, 'Country', 'country_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'country_id' => 'Country',
            'active' => 'Active',
            'title' => 'Title',
            'latin' => 'Latin',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id, true);
        $criteria->compare('country_id', $this->country_id, true);
        $criteria->compare('active', $this->active);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('latin', $this->latin, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

}