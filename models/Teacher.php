<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "teacher".
 *
 * @property integer $TeacherID
 * @property string $Teacher
 * @property string $Phone
 * @property string $Email
 */
class Teacher extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'teacher';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Teacher', 'Phone', 'Email'], 'required'],
            [['Teacher'], 'string', 'max' => 300],
            [['Phone'], 'string', 'max' => 20],
            [['Email'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'TeacherID' => Yii::t('app', 'Teacher ID'),
            'Teacher' => Yii::t('app', 'Teacher'),
            'Phone' => Yii::t('app', 'Phone'),
            'Email' => Yii::t('app', 'Email'),
        ];
    }
}
