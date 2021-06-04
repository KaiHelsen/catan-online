<?php


namespace App\Service;


use Exception;

class DiceRoll
{
    private int $firstDieRoll;
    private int $secondDieRoll;
    private int $rollTotal;

    /**
     * @throws Exception
     */
    public function __construct()
    {
        $this->firstDieRoll = random_int(1,6);
        $this->secondDieRoll = random_int(1,6);
        $this->rollTotal = $this->firstDieRoll + $this->secondDieRoll;
    }

    /**
     * @return int
     */
    public function getFirstDieRoll(): int
    {
        return $this->firstDieRoll;
    }

    /**
     * @return int
     */
    public function getSecondDieRoll(): int
    {
        return $this->secondDieRoll;
    }

    /**
     * @return int
     */
    public function getRollTotal(): int
    {
        return $this->rollTotal;
    }

}
