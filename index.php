<?php

// Carga la imagen del skin
$skin = $_FILES["skin"];

// Obtiene la imagen del skin
$skinData = file_get_contents($skin["tmp_name"]);

// Crea una imagen a partir de los datos del skin
$skinImage = imagecreatefromstring($skinData);

// Recorta la imagen del skin
$cuerpo = imagecrop($skinImage, [0, 0, 64, 32]);
$cabeza = imagecrop($skinImage, [64, 0, 64, 32]);
$piernas = imagecrop($skinImage, [128, 0, 64, 32]);
$pies = imagecrop($skinImage, [192, 0, 64, 32]);

// Reemplaza las partes del skin
$cabezaReemplazada = clone($cuerpo);
$esquinaReemplazada = clone($cabeza);
$brazoIzquierdoReemplazado = clone($piernas);
$brazoDerechoReemplazado = clone($pies);
$pechoReemplazado = clone($cabeza);

// Crea la plantilla del skin
$plantilla = imagecreatetruecolor(64, 64);
imagecopy($plantilla, $cuerpo, 0, 0, 0, 0, 64, 32);
imagecopy($plantilla, $cabezaReemplazada, 0, 0, 64, 0, 64, 32);
imagecopy($plantilla, $piernas, 0, 0, 128, 0, 64, 32);
imagecopy($plantilla, $pies, 0, 0, 192, 0, 64, 32);
imagecopy($plantilla, $esquinaReemplazada, 0, 0, 256, 0, 64, 32);
imagecopy($plantilla, $brazoIzquierdoReemplazado, 0, 0, 320, 0, 64, 32);
imagecopy($plantilla, $brazoDerechoReemplazado, 0, 0, 384, 0, 64, 32);
imagecopy($plantilla, $pechoReemplazado, 0, 0, 448, 0, 64, 32);

// Exporta la imagen del skin
header("Content-Type: image/png");
imagepng($plantilla);

// Destruye la imagen del skin
imagedestroy($skinImage);
imagedestroy($plantilla);

?>
