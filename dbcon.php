<?php

require __DIR__.'/vendor/autoload.php';

use Kreait\Firebase\Factory;

$factory = (new Factory)
    ->withServiceAccount('musify-c62ad-firebase-adminsdk-tc5zk-02acdc6c11.json')
    ->withDatabaseUri('https://musify-c62ad-default-rtdb.firebaseio.com');

$database = $factory->createDatabase();
$auth = $factory->createAuth();
?>