<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\DiffuseurSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Diffuseurs');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="diffuseur-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

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
            //'param_frequence_connexion',
            'param_vitesse_ventilo',
            //'param_compresseur',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
