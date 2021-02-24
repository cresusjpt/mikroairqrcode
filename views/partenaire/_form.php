<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Partenaire */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="partenaire-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="col-sm-6">
        <?= $form->field($model, 'raison_sociale')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'type')->dropDownList([ 'c' => 'Client', 'd' => 'Distributeur', ], ['prompt' => '']) ?>

        <?= $form->field($model, 'adresse_1')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'adresse_2')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-sm-6">
        <?= $form->field($model, 'code_postal')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'ville')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'telephone')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'mobile')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    </div>

    <br>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', $model->isNewRecord ? 'Enrégistrer' : "Modifier"), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
