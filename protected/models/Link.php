<?php

/**
 * This is the model class for table "link".
 *
 * The followings are the available columns in table 'link':
 * @property integer $id
 * @property string $full_link
 * @property string $short_link
 */
class Link extends CActiveRecord
{

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'link';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array(
                'full_link, short_link',
                'required',
                'message' => 'Значение не может быть пустым'
            ),
            array(
                'full_link',
                'length',
                'max' => 512
            ),
            array(
                'full_link',
                'url',
                'defaultScheme' => 'http',
                'allowEmpty' => false,
                'message' => 'Неверный URL'
            ),
            array(
                'short_link',
                'length',
                'max' => 64
            ),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, full_link, short_link', 'safe', 'on' => 'search'),
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
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'full_link' => 'Ваша ссылка',
            'short_link' => 'Сокращённая ссылка',
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

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('full_link', $this->full_link, true);
        $criteria->compare('short_link', $this->short_link, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Link the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }
}
