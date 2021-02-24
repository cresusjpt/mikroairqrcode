<?php

use Da\QrCode\Contracts\ErrorCorrectionLevelInterface;
use Da\QrCode\Label;
use Da\QrCode\QrCode;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Codeqr */

$this->title = Yii::t('app', 'Diffuseur QR Code');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'QR Code'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="codeqr-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
