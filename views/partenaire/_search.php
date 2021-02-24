<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PartenaireSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="partenaire-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'distributeur_id') ?>

    <?= $form->field($model, 'type') ?>

    <?= $form->field($model, 'numero') ?>

    <?= $form->field($model, 'raison_sociale') ?>

    <?php // echo $form->field($model, 'adresse_1') ?>

    <?php // echo $form->field($model, 'adresse_2') ?>

    <?php // echo $form->field($model, 'code_postal') ?>

    <?php // echo $form->field($model, 'ville') ?>

    <?php // echo $form->field($model, 'telephone') ?>

    <?php // echo $form->field($model, 'mobile') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'logo') ?>

    <?php // echo $form->field($model, 'template') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
