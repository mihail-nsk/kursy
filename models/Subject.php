<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "subject".
 *
 * @property integer $SubjectID
 * @property string $Subject
 * @property integer $TeacherID
 * @property integer $FilialID
 */
class Subject extends MyModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'subject';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Subject', 'FilialID'], 'required'],
            [['FilialID','TeacherID'], 'integer'],
            [['Subject'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'SubjectID' => Yii::t('app', 'Subject ID'),
            'Subject' => Yii::t('app', 'Subject'),
            'TeacherID' => Yii::t('app', 'Teacher'),
            'FilialID' => Yii::t('app', 'Filial ID'),
        ];
    }

    public function getFilial(){
        return $this->hasOne(Filial::className(),['FilialID'=>'FilialID']);
    }

    public function getTeacher(){
        return $this->hasOne(Teacher::className(),['TeacherID'=>'TeacherID']);
    }
}
