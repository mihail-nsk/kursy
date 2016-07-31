<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "filial".
 *
 * @property integer $FilialID
 * @property string $Address
 * @property string $Phone
 * @property string $Email
 */
class Filial extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'filial';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Address', 'Phone', 'Email'], 'required'],
            [['Address'], 'string', 'max' => 300],
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
            'FilialID' => 'Filial ID',
            'Address' => Yii::t('app','Address'),
            'Phone' => Yii::t('app','Phone'),
            'Email' => Yii::t('app','Email'),
        ];
    }
}
