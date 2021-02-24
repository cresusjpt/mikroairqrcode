<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Diffuseur */

$this->title = $model->client->raison_sociale;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Diffuseurs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="diffuseur-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'client.raison_sociale',
            'info_unique_id',
            //'info_numero_serie',
            'info_date_installation:date',
            'info_date_derniere_connexion:date',
            //'info_emplacement',
            //'info_etat',
            'param_duree_cycle_on',
            'param_duree_cycle_off',
            //'param_programmation',
            'param_frequence_connexion',
            'param_vitesse_ventilo',
            //'param_compresseur',
        ],
    ]) ?>

</div>
