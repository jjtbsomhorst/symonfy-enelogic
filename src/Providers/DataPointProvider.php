<?php

namespace App\Enelogic\Client\Providers;

use App\Enelogic\Client\Decoders\BaseDecoder;
use App\Enelogic\Client\Decoders\DataPointEntityDecoder;
use GuzzleHttp\Client;

class DataPointProvider extends BaseProvider
{
    CONST PRIMARY_PARAM = "measuringpoints";
    private string $listByDayEndpoint;
    private string $listByMonth;

    public function __construct(Client $client)
    {
        parent::__construct($client, self::PRIMARY_PARAM,new DataPointEntityDecoder());
        $this->listEndpoint = $this->detailEndpoint . "/datapoints/{from}/{until}";
        $this->listByDayEndpoint = $this->detailEndpoint . "/datapoint/days/{from}/{until}";
        $this->listByMonth = $this->detailEndpoint . "/datapoint/months/{from}/{until}";
    }

    /**
     * @throws \Exception
     */
    public function listPoints(string $pointId, \DateTimeImmutable $from, \DateTimeImmutable $until) :array
    {
        return $this->doListPointRequest($this->listEndpoint, $pointId, $from, $until);
    }

    /**
     * @throws \Exception
     */
    public function listByDays(int $pointId, \DateTimeImmutable $from, \DateTimeImmutable $until) : array
    {
        return $this->doListPointRequest($this->listByDayEndpoint, $pointId, $from, $until);
    }

    /**
     * @throws \Exception
     */
    public function listByMonth(string $pointId, \DateTimeImmutable $from, \DateTimeImmutable $until) : array
    {
        return $this->doListPointRequest($this->listByMonth, $pointId, $from, $until);
    }

    /**
     * @throws \Exception
     */
    private function doListPointRequest(string $url, string $pointId, \DateTimeImmutable $from, \DateTimeImmutable $until): array
    {
        $params = [
            'measuringpoints' => $pointId,
            'from' => $from->format('Y-m-d'),
            'until' => $until->format('Y-m-d')
        ];
        return $this->doListRequest($url, $params);
    }
}