<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Partenaire */

$this->title = Yii::t('app', 'Ajouter Client');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Clients'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="partenaire-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
