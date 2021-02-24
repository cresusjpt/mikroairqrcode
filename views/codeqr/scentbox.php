<?php

use yii\helpers\Html; ?>
    <div id="top">
        <?= Html::input("text", "diffuserid", "Identifiant", [
            "id" => "diffuserid",
            "class" => "form-control"
        ]) ?>
        <!--<input id="diffuserid" type="codetext" value="Identifiant diffuseur"/>-->
    </div>

    <div id="qrcode">

    </div>

<?php
$script = <<< JS
var textfield = document.getElementById("diffuserid");

function makeCode () {		
  if (!textfield.value)
    return;
  var qr = qrcode(0, 'M');
  qr.addData(textfield.value);
  qr.make();
  var qrContainer = document.getElementById("qrcode");
  qrContainer.innerHTML = qr.createSvgTag({
    scalable: true
  });
  qrContainer.children[0].setAttribute("preserveAspectRatio", "xMidyMid meet");
}

makeCode();

textfield.addEventListener('input', makeCode);

JS;
$this->registerJs($script);
?>