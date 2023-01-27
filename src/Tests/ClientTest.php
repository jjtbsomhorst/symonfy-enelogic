<?php
require 'vendor/autoload.php';

use jjtbsomhorst\enelogic\EneLogicClient;
use kamermans\OAuth2\Persistence\TokenPersistenceInterface;
use PHPUnit\Framework\TestCase;

final class ClientTest extends TestCase
{
    private ?TokenPersistenceInterface $persistence;
    private ?EneLogicClient $client = null;

    public function setUp(): void
    {
        parent::setUp();
        error_log(getcwd());
        $this->persistence = new \kamermans\OAuth2\Persistence\FileTokenPersistence("/app/assets/access_token.json");
        if (!$this->persistence->hasToken()) {
            throw new Exception("Toke not found at path..");
        }

        $this->client = new EneLogicClient($this->persistence, $_ENV['ENELOGIC_APPLICATION_ID'],$_ENV['ENELOGIC_APPLICATION_SECRET']);
    }

    public function testDevices(){

        $devices = $this->client->devices()->listItems();
        self::assertNotEmpty($devices);
    }

    public function testUser(){
        $users = $this->client->getUserProvider()->listItems();
        print_r($users);
        self::assertNotEmpty($users);
    }


}