<?php
use Db\Rezervace;

class Vstupenky extends Rezervace
{
    CONST FREE_TIKETS = 1000;

    public function getCountTiketsAvailable()
    {
        return self::FREE_TIKETS - Rezervace::count('tikets');
    }

    public function isVisitor() {
        return ($this->getCountTiketsAvailable() > 0) ? true : false;
    }

    public function isBuyTime()
    {
        return ($this->isAfterBuyTimeBegin() === true && $this->isBeforeBuyTimeEnd() == true) ? true : false;
    }

    public function isAfterBuyTimeBegin()
    {
        $now = \Carbon\Carbon::now("Europe/Prague");
        $buy = \Carbon\Carbon::create(2016, 4, 23, 14, 0, 0, "Europe/Prague");
        return $now->gt($buy);
    }

    public function isBeforeBuyTimeEnd()
    {
        $now = \Carbon\Carbon::now("Europe/Prague");
        $buy = \Carbon\Carbon::create(2016, 4, 29, 14, 0, 0, "Europe/Prague");
        return $now->lt($buy);
    }

    public function isBeforeUnsubscribeTimeEnd()
    {
        $now = \Carbon\Carbon::now("Europe/Prague");
        $buy = \Carbon\Carbon::create(2016, 4, 29, 14, 0, 0, "Europe/Prague");
        return $now->lt($buy);
    }
}