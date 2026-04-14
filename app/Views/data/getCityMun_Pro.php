<?php

use App\Models\Citymun_model;

$provCode = $_GET['id'];
$citymun = new Citymun_model();
$result = $citymun->getCityMun($provCode);

if ($province) :
    foreach ($result->getResult() as $post) :
    echo '<option value="' . $post->provCode . '">' . strtoupper($post->citymunDesc) . '</option>';
    endforeach;
endif;