<?php

require '../vendor/autoload.php';


use Testo\Controllers\User\User as cUser;
use Testo\Model\User\User as mUser;

$tom = new cUser(new mUser('Tom', 20));
$lisa = new cUser(new mUser('Lisa', 10));

echo $tom->check();
echo $lisa->check();