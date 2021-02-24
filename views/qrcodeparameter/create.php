<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Qrcodeparameter */

$this->title = Yii::t('app', 'Paramètres');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Qrcodeparameters'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="qrcodeparameter-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
