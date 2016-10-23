<?php

namespace Alphatrader\ApiBundle\Model;

use JMS\Serializer\Annotation;

/**
 * Class SalaryPayment
 * @package Alphatrader\ApiBundle\Model
 * @author Tr0nYx
 */
class SalaryPayment
{
    use DateTrait;

    /**
     * @var string
     * @Annotation\Type("string")
     * @Annotation\SerializedName("id")
     */
    private $id;

    /**
     * @var string
     * @Annotation\Type("string")
     * @Annotation\SerializedName("companyId")
     */
    private $companyId;

    /**
     * @var string
     * @Annotation\Type("string")
     * @Annotation\SerializedName("nextPossiblePaymentDate")
     */
    private $nextPossiblePayment;

    /**
     * @var float
     * @Annotation\Type("float")
     * @Annotation\SerializedName("salaryAmount")
     */
    private $salaryAmount;

    /**
     * @return string
     */
    public function getCompanyId()
    {
        return $this->companyId;
    }

    /**
     * @param string $companyId
     */
    public function setCompanyId($companyId)
    {
        $this->companyId = $companyId;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return \DateTime
     */
    public function getNextPossiblePaymentDate()
    {
        return $this->nextPossiblePayment;
    }

    /**
     * @param int $nextPossiblePayment
     */
    public function setNextPossiblePaymentDate($nextPossiblePayment)
    {
        $this->nextPossiblePayment = $nextPossiblePayment;
    }

    /**
     * @return float
     */
    public function getSalaryAmount()
    {
        return $this->salaryAmount;
    }

    /**
     * @param float $salaryAmount
     */
    public function setSalaryAmount($salaryAmount)
    {
        $this->salaryAmount = $salaryAmount;
    }

    /**
     * @SuppressWarnings("unused")
     * @Annotation\PostDeserialize
     */
    private function afterDeserialization()
    {
        if ($this->nextPossiblePayment !== null) {
            $date = substr($this->nextPossiblePayment, 0, 10) . '.' . substr($this->nextPossiblePayment, 10);
            $micro = sprintf("%06d", ($date - floor($date)) * 1000000);
            $date = new \DateTime(date('Y-m-d H:i:s.' . $micro, $date));
            $this->nextPossiblePayment = $date;
        }
    }
}
