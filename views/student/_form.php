<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Subject;
use app\models\Filial;

/* @var $this yii\web\View */
/* @var $model app\models\Student */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="student-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'FirstName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'LastName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MiddleName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Class')->dropDownList(['8'=>8,'9'=>9,'10'=>10,'11'=>11]) ?>

    <?= $form->field($model, 'FilialID')->dropDownList($filials) ?>

    <?= $form->field($model, 'Comment')->textarea() ?>

    <?php
        $filial = Filial::find()->all();
        foreach($filial as $f){ ?>
            <div class="filials" data-id="<?= $f->FilialID ?>">
                <?php
                    $subjects = Subject::find()->where(['FilialID'=>$f->FilialID])->all();
                    foreach($subjects as $s){ ?>
                        <div class="subject">
                        <?php
                            echo Html::label($s->Subject,'subject'.$s->SubjectID);
                            echo Html::checkbox('subject_'.$s->SubjectID,false,['id'=>'subject'.$s->SubjectID]);
                        ?>
                        </div>
                    <?php }
                ?>
            </div>
        <?php }
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
