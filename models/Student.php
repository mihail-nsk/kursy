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
 * @property string $Email
 * @property integer $Class
 * @property integer $FilialID
 * @property string $Comment
 */
class Student extends \yii\db\ActiveRecord
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
            [['FirstName', 'LastName', 'MiddleName', 'Phone', 'Email'], 'string', 'max' => 32],
            [['Phone'], 'unique'],
            [['Email'], 'unique'],
            [['Comment'],'safe']
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
            'Email' => Yii::t('app', 'Email'),
            'Class' => Yii::t('app', 'Class'),
            'FilialID' => Yii::t('app', 'Filial ID'),
            'Comment' => Yii::t('app','Comment')
        ];
    }

    public function getFilial(){
        return $this->hasOne(Filial::className(),['FilialID'=>'FilialID']);
    }
}
