<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DiffuseurSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="diffuseur-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'client_id') ?>

    <?= $form->field($model, 'info_unique_id') ?>

    <?= $form->field($model, 'info_numero_serie') ?>

    <?= $form->field($model, 'info_date_installation') ?>

    <?php // echo $form->field($model, 'info_date_derniere_connexion') ?>

    <?php // echo $form->field($model, 'info_emplacement') ?>

    <?php // echo $form->field($model, 'info_etat') ?>

    <?php // echo $form->field($model, 'param_duree_cycle_on') ?>

    <?php // echo $form->field($model, 'param_duree_cycle_off') ?>

    <?php // echo $form->field($model, 'param_programmation') ?>

    <?php // echo $form->field($model, 'param_frequence_connexion') ?>

    <?php // echo $form->field($model, 'param_vitesse_ventilo') ?>

    <?php // echo $form->field($model, 'param_compresseur') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
