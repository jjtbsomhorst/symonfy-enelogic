<?php

use App\Enelogic\Client\EneLogicClient;
use kamermans\OAuth2\Persistence\FileTokenPersistence;

$persistence = new FileTokenPersistence('');
$client = new EneLogicClient($persistence,'','');

$building = $client->buildings()->getItem('');

