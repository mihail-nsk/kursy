<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "expenses".
 *
 * @property integer $ExpensesID
 * @property string $Expenses
 * @property integer $UserID
 */
class Expenses extends \yii\db\ActiveRecord
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
            [['UserID'], 'integer'],
            [['Expenses'], 'string', 'max' => 300],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ExpensesID' => 'Expenses ID',
            'Expenses' => 'Expenses',
            'UserID' => 'User ID',
        ];
    }
}
