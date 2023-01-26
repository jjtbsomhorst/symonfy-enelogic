<?php

use App\Enelogic\Client\EneLogicClient;

$client = new EneLogicClient(null,'','');
$client->buildings()->getItem('');
