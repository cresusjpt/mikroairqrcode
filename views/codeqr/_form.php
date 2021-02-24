<?php

use app\models\Diffuseur;
use app\models\Partenaire;
use kartik\color\ColorInput;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Codeqr */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="codeqr-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'partenaire')->widget(Select2::class, [
        'data' => \yii\helpers\ArrayHelper::map(Partenaire::find()->all(), 'id', 'raison_sociale'),
        'language' => 'fr',
        'options' => ['placeholder' => 'Selectionner le partenaire'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'diffuser')->widget(Select2::class, [
        'data' => ArrayHelper::map(Diffuseur::find()->orderBy('info_date_derniere_connexion desc')->all(), 'id', 'diffuseurinfo'),
        'language' => 'fr',
        'options' => ['placeholder' => 'Selectionner le diffuseur'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', $model->isNewRecord ? 'Enrégistrer' : 'Modifier'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
