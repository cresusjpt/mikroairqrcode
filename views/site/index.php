<?php

/* @var $this yii\web\View */

use kv4nt\owlcarousel\OwlCarouselWidget;
use yii\helpers\Url;

OwlCarouselWidget::begin([
    'container' => 'div',
    'containerOptions' => [
        'id' => 'container-id',
        'class' => 'container-class'
    ],
    'pluginOptions' => [
        'autoplay' => true,
        'autoplayTimeout' => 3000,
        'items' => 3,
        'loop' => true,
        'itemsDesktop' => [1199, 3],
        'itemsDesktopSmall' => [979, 3]
    ]
]);

$this->title = 'Mikroair QR Code Generator';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>QR Code Generator</h1>

        <p class="lead">Créer les codes qr des Mikroair facilement !</p>

        <p><a class="btn btn-lg btn-success" href="<?=Url::to(['/codeqr/create']) ?>">Générer</a></p>

    </div>

    <div class="body-content">
        <div class="row">
            <div class="item-class"><img src="http://www.klipair.com/images/papillons.jpg" alt=""></div>
            <div class="item-class"><img src="https://www.google.com/url?sa=i&url=http%3A%2F%2Fwww.klipair.com%2Findex.php%2Fnos-produits-et-services%2Fnos-produits&psig=AOvVaw1qz_stohT7FSyql3ZhSHWc&ust=1613613019702000&source=images&cd=vfe&ved=0CAIQjRxqFwoTCKD5gYjn7-4CFQAAAAAdAAAAABAD" alt=""></div>
        </div>
    </div>
</div>