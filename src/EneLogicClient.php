<?php

namespace App\Enelogic\Client;

use App\Enelogic\Client\Decoders\BuildingEntityDecoder;
use App\Enelogic\Client\Decoders\MeasuringPointEntityDecoder;
use App\Enelogic\Client\Providers\BaseProvider;
use App\Enelogic\Client\Providers\DataPointProvider;
use App\Enelogic\Client\Providers\DeviceProvider;
use App\Enelogic\Client\Providers\IEntityProvider;
use App\Enelogic\Client\Providers\MeasuringPointProvider;
use App\Enelogic\Client\Providers\OrganisationProvider;
use App\Enelogic\Client\Providers\UserProvider;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use kamermans\OAuth2\GrantType\RefreshToken;
use kamermans\OAuth2\OAuth2Middleware;
use kamermans\OAuth2\Persistence\FileTokenPersistence;
use kamermans\OAuth2\Persistence\TokenPersistenceInterface;
use kamermans\OAuth2\Signer\AccessToken\QueryString;

class EneLogicClient
{
    private Client $client;

    public function __construct(
        private string $baseurl = 'https://enelogic.com/api/',
        private TokenPersistenceInterface $persistence,
        private string $enelogicAppId,
        private string $enelogicAppSecret
    ){
        $this->setUp();
    }

    private function setUp(){

        $reauthclient = new Client([
            'base_uri' => 'https://enelogic.com/oauth/v2/token'
        ]);

        $reauth_config = [
            "client_id" => $this->enelogicAppId,
            "client_secret" => $this->enelogicAppSecret,
            "scope" => "account", // optional
            "state" => time(), // optional
        ];

        $oauth = new OAuth2Middleware(new RefreshToken($reauthclient, $reauth_config));
        $oauth->setTokenPersistence($this->persistence);
        $oauth->setAccessTokenSigner(new QueryString());
        $stack = HandlerStack::create();
        $stack->push($oauth);

        $this->client = new Client([
            'base_uri'  => $this->baseurl,
            'headers'   => [ 'Content-Type' => 'application/json'],
            'handler'  => $stack,
            'auth'     => 'oauth',
        ]);
    }

    public function getBuildingProvider() : IEntityProvider {
        return new BaseProvider($this->client, 'buildings', new BuildingEntityDecoder());
    }

    public function getDataPointProvider() {
        return new DataPointProvider($this->client);
    }
    public function getMeasurePointProvider() {
        return new MeasuringPointProvider($this->client);
    }
    public function getDeviceProvider () {
        return new DeviceProvider($this->client);
    }

    public function getOrganisationProvider () {
        return new OrganisationProvider($this->client);
    }

    public function getUserProvider () {
        return new UserProvider($this->client);
    }
}