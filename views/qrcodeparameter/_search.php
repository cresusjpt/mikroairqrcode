<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\QrcodeparameterSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="qrcodeparameter-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'logo') ?>

    <?= $form->field($model, 'titre') ?>

    <?= $form->field($model, 'taille') ?>

    <?= $form->field($model, 'logo_source') ?>

    <?php // echo $form->field($model, 'police') ?>

    <?php // echo $form->field($model, 'background') ?>

    <?php // echo $form->field($model, 'foreground') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
