<?php

namespace jjtbsomhorst\enelogic\Client\Model;

class EnelogicDataPoint extends EnelogicEntity
{
    private int $measuringPointId;
    public function __construct(private ?int $id, private string $quantity, private int $rate)
    {
        parent::__construct($id);
    }

    /**public
     * @return string
     */
    public function getQuantity(): string
    {
        return $this->quantity;
    }

    /**
     * @param string $quantity
     */
    public function setQuantity(string $quantity): void
    {
        $this->quantity = $quantity;
    }

    /**
     * @return int
     */
    public function getRate(): int
    {
        return $this->rate;
    }

    /**
     * @param int $rate
     */
    public function setRate(int $rate): void
    {
        $this->rate = $rate;
    }

    public function setMeasuringPointId(int $measuringPointId){
        $this->measuringPointId = $measuringPointId;
    }
    /**
     * @return int
     */
    public function getMeasuringPointId(): int
    {
        return $this->measuringPointId;
    }


}