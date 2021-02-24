<?php

use app\models\Diffuseur;
use app\models\Qrcodeparameter;
use Da\QrCode\Contracts\ErrorCorrectionLevelInterface;
use Da\QrCode\Label;
use Da\QrCode\QrCode;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Codeqr */

$this->title = $model->diffuser0->client->raison_sociale;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Codeqrs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="codeqr-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Modifier'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Supprimer'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', "Voulez-vous vraimment supprimer cet élément ?"),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'source:image',
            'partenaire0.raison_sociale',
            'diffuser',
        ],
    ]) ?>

    <?= Html::a("Télécharger l'image",$model->source) ?>

    <?php
    /*$parameter = Qrcodeparameter::find()->one();
    $diffuser = Diffuseur::find()->where(['id' => $model->diffuser])->one();
    $qrCode = (new Qrcode($diffuser->info_unique_id));

    if ($parameter != null) {
        if ($parameter->titre > 0) {
            $label = (new Label($diffuser->info_unique_id))->setFontSize($parameter->police);
            $qrCode->setLabel($label);
        }

        $hexBack = $parameter->background;
        $hexFore = $parameter->foreground;
        list($rb, $gb, $bb) = sscanf($hexBack, "#%02x%02x%02x");
        list($rf, $gf, $bf) = sscanf($hexFore, "#%02x%02x%02x");

        $qrCode->setForegroundColor($rf, $gf, $bf);
        $qrCode->setBackgroundColor($rb, $gb, $bb);
        $qrCode->setEncoding('UTF-8')
            ->setErrorCorrectionLevel(ErrorCorrectionLevelInterface::HIGH)
            ->setSize($parameter->taille)
            ->setMargin(3);


        $pathname = Yii::$app->basePath. "/web/codes/" . $diffuser->info_unique_id . ".png";

        //echo $pathname;

        $model->source = $pathname;

        //die();

        $qrCode->writeFile($pathname);
    }*/
    ?>

</div>
