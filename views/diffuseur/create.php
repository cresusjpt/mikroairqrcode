<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Diffuseur */

$this->title = Yii::t('app', 'Create Diffuseur');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Diffuseurs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="diffuseur-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
