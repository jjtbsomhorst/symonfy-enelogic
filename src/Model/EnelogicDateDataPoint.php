<?php

namespace jjtbsomhorst\enelogic\Model;

class EnelogicDateDataPoint extends EnelogicDataPoint
{
    public function __construct(?int $id, string $quantity, int $rate, protected string $date)
    {
        parent::__construct($id, $quantity, $rate);
    }

    public function getDate(): \DateTimeImmutable
    {
        return \DateTimeImmutable::createFromFormat('Y-m-d H:i:s', $this->date);
    }
}