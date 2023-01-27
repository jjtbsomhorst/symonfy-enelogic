<?php
require 'vendor/autoload.php';

use jjtbsomhorst\enelogic\EneLogicClient;
use kamermans\OAuth2\Persistence\TokenPersistenceInterface;
use PHPUnit\Framework\TestCase;

final class ClientTest extends TestCase
{
    private ?TokenPersistenceInterface $persistence;
    public function setUp(): void
    {
        parent::setUp();
        error_log(getcwd());
        $this->persistence = new \kamermans\OAuth2\Persistence\FileTokenPersistence("/app/assets/access_token.json");
        if (!$this->persistence->hasToken()) {
            throw new Exception("Toke not found at path..");
        }
    }

    public function testDevices(){
        print_r("hello");
        $client = new EneLogicClient($this->persistence, $_ENV['ENELOGIC_APPLICATION_ID'],$_ENV['ENELOGIC_APPLICATION_SECRET']);
        $devices = $client->devices()->listItems();

        print_r($devices);
        self::assertNotEmpty($devices);
    }

}