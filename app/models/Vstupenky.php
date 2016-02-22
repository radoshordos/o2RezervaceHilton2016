<?php
use Db\Rezervace;

class Vstupenky extends Rezervace
{
    CONST TIMEZONE = "Europe/Prague";
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
        $now = \Carbon\Carbon::now(self::TIMEZONE);
        $buy = \Carbon\Carbon::create(2016, 2, 20, 14, 0, 0, self::TIMEZONE);
        return $now->gt($buy);
    }

    public function isBeforeBuyTimeEnd()
    {
        $now = \Carbon\Carbon::now(self::TIMEZONE);
        $buy = \Carbon\Carbon::create(2016, 2, 29, 14, 0, 0, self::TIMEZONE);
        return $now->lt($buy);
    }

    public function isBeforeUnsubscribeTimeEnd()
    {
        $now = \Carbon\Carbon::now(self::TIMEZONE);
        $buy = \Carbon\Carbon::create(2016, 2, 29, 14, 0, 0, self::TIMEZONE);
        return $now->lt($buy);
    }
}