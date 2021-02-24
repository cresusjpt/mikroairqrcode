<?php

use kartik\color\ColorInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Qrcodeparameter */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="qrcodeparameter-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'taille')->dropDownList([ 150 => '150', 200 => '200', 300 => '300', 400 => '400', 500 => '500', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'police')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'foreground')->widget(ColorInput::class, [
        'options' => [
            'placeholder' => 'Select color ...',
            'useNative' => true,
        ],
        'size' => 'sm',
        'readonly' => true
        //'useNative' => true,
    ]) ?>

    <?= $form->field($model, 'background')->widget(ColorInput::class, [
        'options' => [
            'placeholder' => 'Select color ...',
            'useNative' => true,
        ],
        'size' => 'sm',
        'readonly' => true
        //'useNative' => true,
    ]) ?>

    <?= $form->field($model, 'titre')->radioList( [0=>'Désactivé', 1 => 'Activé'] ) ?>

    <?= $form->field($model, 'logo')->radioList( [0=>'Désactivé', 1 => 'Activé'] ) ?>

    <?= $form->field($model, 'file')->fileInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', $model->isNewRecord ? 'Enrégister' : 'Modifier'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
