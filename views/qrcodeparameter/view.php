<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Qrcodeparameter */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Paramètres'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="qrcodeparameter-view">

    <p>
        <?= Html::a(Yii::t('app', 'Modifier'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Supprimer'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Voulez vous vraiment supprimer ?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'taille',
            'police',
            [
                'label' => "Logo",
                "value" => function ($model) {
                    if ($model->logo == 0)
                        return "Non";
                    else return "Oui";
                }
            ],
            [
                'label' => "Titre",
                "value" => function ($model) {
                    if ($model->titre == 0)
                        return "Non";
                    else return "Oui";
                }
            ],
            'background',
            'foreground',

        ],
    ]) ?>

</div>
