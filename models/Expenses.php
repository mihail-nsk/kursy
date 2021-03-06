<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "expenses".
 *
 * @property integer $ExpensesID
 * @property string $Expenses
 * @property integer $UserID
 * @property string $Date
 * @property integer $People
 */
class Expenses extends MyModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'expenses';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Expenses', 'UserID'], 'required'],
            [['UserID', 'People'], 'integer'],
            [['Date'], 'safe'],
            [['Expenses'], 'string', 'max' => 300],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ExpensesID' => Yii::t('app', 'Expenses ID'),
            'Expenses' => Yii::t('app', 'Expenses'),
            'UserID' => Yii::t('app', 'User ID'),
            'Date' => Yii::t('app', 'Date expenses'),
            'People' => Yii::t('app', 'People'),
        ];
    }

    public function beforeValidate()
    {
        $this->UserID = Yii::$app->user->id;
        return parent::beforeValidate(); // TODO: Change the autogenerated stub
    }
}
