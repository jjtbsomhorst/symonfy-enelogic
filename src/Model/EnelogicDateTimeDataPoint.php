<?php

namespace jjtbsomhorst\enelogic\Model;

class EnelogicDateTimeDataPoint extends EnelogicDataPoint
{
    public function __construct(private ?int $id, private string $quantity, private int $rate, private string $datetime)
    {
        parent::__construct($this->id, $this->quantity, $this->rate);
    }

    /**
     * @return string
     */
    public function getDatetime(): \DateTimeImmutable
    {
        return \DateTimeImmutable::createFromFormat('Y-m-d H:i:s', $this->datetime);
    }
}