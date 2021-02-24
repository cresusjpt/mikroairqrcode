<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Partenaire */

$this->title = $model->raison_sociale;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Clients'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="partenaire-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Modifier'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Supprimer'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', "Voulez-vous vraiment supprimer cet élément ?"),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'raison_sociale',
            'adresse_1',
            'adresse_2',
            'code_postal',
            'ville',
            'telephone',
            'mobile',
            'email:email',
            [
                'label' => "Type",
                'value' => function ($model) {
                    if ($model->type == "c")
                        return "Client";
                    else return "Distributeur";
                }
            ],
            //'type',
        ],
    ]) ?>

</div>
