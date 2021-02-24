<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Diffuseur */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="diffuseur-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'client_id')->textInput() ?>

    <?= $form->field($model, 'info_unique_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'info_numero_serie')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'info_date_installation')->textInput() ?>

    <?= $form->field($model, 'info_date_derniere_connexion')->textInput() ?>

    <?= $form->field($model, 'info_emplacement')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'info_etat')->textInput() ?>

    <?= $form->field($model, 'param_duree_cycle_on')->textInput() ?>

    <?= $form->field($model, 'param_duree_cycle_off')->textInput() ?>

    <?= $form->field($model, 'param_programmation')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'param_frequence_connexion')->textInput() ?>

    <?= $form->field($model, 'param_vitesse_ventilo')->textInput() ?>

    <?= $form->field($model, 'param_compresseur')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
