<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "student".
 *
 * @property integer $StudentID
 * @property string $FirstName
 * @property string $LastName
 * @property string $MiddleName
 * @property string $Phone
 * @property integer $Class
 * @property integer $FilialID
 * @property string $Comment
 * @property string $Email
 * @property string $Date
 * @property string $link
 * @property string $source
 * @property string $manager
 */
class Student extends MyModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'student';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['FirstName', 'LastName', 'Class', 'FilialID'], 'required'],
            [['Class', 'FilialID'], 'integer'],
            [['Comment'], 'string'],
            [['Date'], 'safe'],
            [['FirstName', 'LastName', 'MiddleName', 'Phone'], 'string', 'max' => 32],
            [['Email', 'link', 'source', 'manager'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'StudentID' => Yii::t('app', 'Student ID'),
            'FirstName' => Yii::t('app', 'First Name'),
            'LastName' => Yii::t('app', 'Last Name'),
            'MiddleName' => Yii::t('app', 'Middle Name'),
            'Phone' => Yii::t('app', 'Phone'),
            'Class' => Yii::t('app', 'Class'),
            'FilialID' => Yii::t('app', 'Filial ID'),
            'Comment' => Yii::t('app', 'Comment'),
            'Email' => Yii::t('app', 'Email'),
            'Date' => Yii::t('app', 'Date contact'),
            'link' => Yii::t('app', 'Link'),
            'source' => Yii::t('app', 'Source'),
            'manager' => Yii::t('app', 'Manager'),
        ];
    }

    public function getFilial(){
        return $this->hasOne(Filial::className(),['FilialID'=>'FilialID']);
    }
}
