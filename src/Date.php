<?php

namespace src;

final class Date
{
    private int $year;
    private int $month;
    private int $day;

    private $fullDate;

    public function __construct(int $year, int $month, int $day)
    {
        if ($year < 0 || !is_int($year)) {
            throw new \InvalidArgumentException("Year must be a positive number: {$year}.");
        }
        if ($month < 0 || $month > 12 || !is_int($month)) {
            throw new \InvalidArgumentException("Month must be between 1 or 12: {$month}.");
        }
        if ($day < 0 || $day > 31 || !is_int($month)) {
            throw new \InvalidArgumentException("Day must be between 1 or 31: {$day}");
        }
        $this->year = $year;
        $this->day = $day;
        if($month >= 10) {
            $this->month = $month;
        }
        else{
            $this->month = '0'.$month;
        }
    }

    public function getYear(): int
    {
        return $this->year;
    }

    public function getMonth(): int
    {
        return $this->month;
    }

    public function getDay(): int
    {
        return $this->day;
    }

    public function isEqual(Date $date): bool
    {
        return $this->year === $date->year && $this->month === $date->month && $this->day === $date->day;
    }

    public function difference(Date $date)
    {
        $fullDate = new \DateTime("{$this->year}-{$this->month}-{$this->day}");
        $otherFullDate = new \DateTime("{$date->getYear()}-{$date->getMonth()}-{$date->getDay()}");

        $differnce = $fullDate->diff($otherFullDate);
        return $differnce->format('%R%a');
    }

    public function format($format = 'Y-m-d')
    {
        $date = new \DateTime("{$this->year}-{$this->month}-{$this->day}");
        return $date->format($format);
    }
}