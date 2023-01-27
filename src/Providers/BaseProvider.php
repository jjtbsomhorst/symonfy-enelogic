<?php

namespace jjtbsomhorst\enelogic\Client\Providers;

use jjtbsomhorst\enelogic\Client\Decoders\BaseDecoder;
use jjtbsomhorst\enelogic\Client\Model\EnelogicEntity;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class BaseProvider implements IEntityProvider
{
    protected string $listEndpoint;
    protected string $detailEndpoint;

    public function __construct(private readonly Client $client, private readonly string $primaryParameter, private BaseDecoder $decoderClass){
        $this->listEndpoint = sprintf('%s/',$this->primaryParameter);
        $this->detailEndpoint = $this->listEndpoint."{".$this->primaryParameter."}";
    }

    /**
     * @throws EnelogicProviderException
     */
    protected function doListRequest(string $url, array $params = [], array $queryParams = []): array{
        $url = $this->getRequestUrl($url, $params, $queryParams);
        try {
            $response = $this->client->get($url);
            if ( $response->getStatusCode() >= 300 ) {
                throw new \Exception("Iets ging er mis..");
            }
            $data = $response->getBody();
            $jsonData = $data->getContents();
            return $this->decoderClass->decodeList($jsonData);
        } catch (GuzzleException $e) {
            throw new EnelogicProviderException($e);
        }

    }

    /**
     * @throws EnelogicProviderException
     */
    protected function doEntityRequest(string $url, array $params = [], array $queryParams = []) : EnelogicEntity{
        $url = $this->getRequestUrl($url, $params, $queryParams);

        try {
            $response = $this->client->get(trim($url));
            if ( $response->getStatusCode() >= 300 ) {
                throw new \Exception("Iets ging er mis..");
            }

            $data = $response->getBody()->getContents();
            return $this->decoderClass->decodeEntity(json_decode($data, true));
        } catch (GuzzleException $e) {
            throw new EnelogicProviderException($e);
        }
    }

    private function getRequestUrl(string $baseUrl, array $params, array $queryParams = []): string
    {
        $keys = array_map(function($value) {
            return "{".$value."}";
        }, array_keys($params));
        return str_replace($keys, array_values($params), $baseUrl);
    }

    /**
     * @throws \Exception
     */
    public function listItems(): array
    {
        return $this->doListRequest($this->listEndpoint);
    }

    /**
     * @throws \Exception
     */
    public function getItem(string $identifier): ?EnelogicEntity
    {
        return $this->doEntityRequest($this->detailEndpoint, [$this->primaryParameter => $identifier]);
    }
}