<?php

use App\Models\Travelpass_model;

function getPassId()
{
    $session = \Config\Services::session();

do {
    // Create a random user id
    $random_unique_int = mt_rand(1200,999999999);

    // Make sure the random user_id isn't already in use
    // $query->free_result();

    $pass_id = "";
    $model = new Travelpass_model();
    $query = $model->where('pass_id', $random_unique_int);
    $pass_id = $random_unique_int;

} while ($query->countAllResults() > 0);

    // $session->remove('pass_id');
    // $session->set('pass_id', $random_unique_int);
    return $pass_id;
}
?>