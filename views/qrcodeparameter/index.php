<?php

use app\models\Qrcodeparameter;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\QrcodeparameterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Paramètres Code QR');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="qrcodeparameter-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php
        if (Qrcodeparameter::find()->count() == 0) {
            ?>
            <?= Html::a(Yii::t('app', 'Ajouter paramétres'), ['create'], ['class' => 'btn btn-success']) ?>
            <?php
        }
        ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'logo',
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
            'taille',
            'police',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
