<?php

namespace Alphatrader\ApiBundle\Model;

use JMS\Serializer\Annotation;

/**
 * Trait DateTrait
 * @package Alphatrader\ApiBundle\Model
 * @author Tr0nYx
 */
trait DateTrait
{
    /**
     * @var \DateTime
     * @Annotation\Type("integer")
     * @Annotation\SerializedName("date")
     */
    private $date;

    /**
     * @var \DateTime
     * @Annotation\Type("integer")
     * @Annotation\SerializedName("startDate")
     */
    private $startDate;

    /**
     * @var \DateTime
     * @Annotation\Type("integer")
     * @Annotation\SerializedName("endDate")
     */
    private $endDate;
    
    /**
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @param \DateTime $startDate
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
    }

    /**
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @param \DateTime $endDate
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
    }
    
    
    /**
     * @SuppressWarnings("unused")
     * @Annotation\PostDeserialize
     */
    private function afterDeserialization()
    {
        if ($this->date !== null) {
            $date = substr($this->date, 0, 10) . '.' . substr($this->date, 10);
            $micro = sprintf("%06d", ($date - floor($date)) * 1000000);
            $date = new \DateTime(date('Y-m-d H:i:s.' . $micro, $date));
            $this->date = $date;
        }
        if ($this->startDate !== null) {
            $date = substr($this->startDate, 0, 10) . '.' . substr($this->startDate, 10);
            $micro = sprintf("%06d", ($date - floor($date)) * 1000000);
            $date = new \DateTime(date('Y-m-d H:i:s.' . $micro, $date));
            $this->startDate = $date;
        }
        if ($this->endDate !== null) {
            $enddate = substr($this->endDate, 0, 10) . '.' . substr($this->endDate, 10);
            $micro = sprintf("%06d", ($enddate - floor($enddate)) * 1000000);
            $date = new \DateTime(date('Y-m-d H:i:s.' . $micro, $enddate));
            $this->endDate = $date;
        }
    }

    /**
     * @SuppressWarnings("unused")
     * @Annotation\PreSerialize
     */
    private function preSerialization()
    {
        if ($this->date instanceof \DateTime) {
            $this->date = $this->date->getTimestamp();
        }
        if ($this->startDate instanceof \DateTime) {
            $this->startDate = $this->startDate->getTimestamp();
        }
        if ($this->endDate instanceof \DateTime) {
            $this->endDate = $this->endDate->getTimestamp();
        }
    }
}
