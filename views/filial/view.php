<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Filial */

$this->title = $model->Address;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Filials'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="filial-view">
    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->FilialID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->FilialID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           // 'FilialID',
            'Address',
            'Phone',
            'Email:email',
        ],
    ]) ?>

</div>
