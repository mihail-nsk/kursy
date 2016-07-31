<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Expenses */

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Expenses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Expenses, 'url' => ['view', 'id' => $model->ExpensesID]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="expenses-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
