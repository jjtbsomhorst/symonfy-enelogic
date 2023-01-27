<?php

namespace jjtbsomhorst\enelogic;

use jjtbsomhorst\enelogic\Client\Decoders\BuildingEntityDecoder;
use jjtbsomhorst\enelogic\Client\Decoders\MeasuringPointEntityDecoder;
use jjtbsomhorst\enelogic\Client\Providers\BaseProvider;
use jjtbsomhorst\enelogic\Client\Providers\DataPointProvider;
use jjtbsomhorst\enelogic\Client\Providers\DeviceProvider;
use jjtbsomhorst\enelogic\Client\Providers\IEntityProvider;
use jjtbsomhorst\enelogic\Client\Providers\MeasuringPointProvider;
use jjtbsomhorst\enelogic\Client\Providers\OrganisationProvider;
use jjtbsomhorst\enelogic\Client\Providers\UserProvider;
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
    const BASEURL = "https://enelogic.com/api";

    public function __construct(
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
            'base_uri'  => self::BASEURL,
            'headers'   => [ 'Content-Type' => 'application/json'],
            'handler'  => $stack,
            'auth'     => 'oauth',
        ]);
    }

    public function buildings() : IEntityProvider {
        return new BaseProvider($this->client, 'buildings', new BuildingEntityDecoder());
    }

    public function dataPoints() {
        return new DataPointProvider($this->client);
    }
    public function measurePoints() {
        return new MeasuringPointProvider($this->client);
    }
    public function devices () {
        return new DeviceProvider($this->client);
    }

    public function organisations () {
        return new OrganisationProvider($this->client);
    }

    public function getUserProvider () {
        return new UserProvider($this->client);
    }
}