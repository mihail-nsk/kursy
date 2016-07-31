<?php

/* @var $this yii\web\View */
/* @var $model app\models\Filial */

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Filials'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Address, 'url' => ['view', 'id' => $model->FilialID]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="filial-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
