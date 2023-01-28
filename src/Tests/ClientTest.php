<?php
require 'vendor/autoload.php';

use jjtbsomhorst\enelogic\EneLogicClient;
use kamermans\OAuth2\Persistence\FileTokenPersistence;
use kamermans\OAuth2\Persistence\TokenPersistenceInterface;
use Monolog\Handler\StreamHandler;
use Monolog\Level;
use Monolog\Logger;
use PHPUnit\Framework\TestCase;

final class ClientTest extends TestCase
{
    private ?TokenPersistenceInterface $persistence;
    private ?EneLogicClient $client = null;

    public function setUp(): void
    {
        parent::setUp();

        // setup logging

        $logger = new Logger('enelogic');
        $logger->pushHandler(new StreamHandler('/app/logs/phpunit.log', Level::Debug));

        // setup the client..

        $this->persistence = new FileTokenPersistence("/app/assets/access_token.json");
        if (!$this->persistence->hasToken()) {
            throw new Exception("Toke not found at path..");
        }



        $this->client = new EneLogicClient(
                            $this->persistence,
                            $_ENV['ENELOGIC_APPLICATION_ID'],
                            $_ENV['ENELOGIC_APPLICATION_SECRET'],
                            $logger
        );
    }

    public function testDevices()
    {

        $devices = $this->client->devices()->listItems();
        self::assertNotEmpty($devices);
    }

    public function testUser()
    {
        $users = $this->client->users()->listItems();
        self::assertNotEmpty($users);
    }

    public function testOrganisations()
    {
        $organisations = $this->client->organisations()->listItems();
        self::assertNotEmpty($organisations);
    }


}