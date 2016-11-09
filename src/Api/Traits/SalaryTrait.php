<?php

namespace Alphatrader\ApiBundle\Api\Traits;

use Alphatrader\ApiBundle\Api\Methods\SalaryController;

/**
 * Class SalaryTrait
 * @package Alphatrader\ApiBundle\Api\Traits
 * @author ljbergmann <l.bergmann@sky-lab.de>
 */
trait SalaryTrait
{
    /**
     * @param $companyId
     * @return \Alphatrader\ApiBundle\Model\EmploymentAgreement|\Alphatrader\ApiBundle\Model\Error
     */
    public function getEmployment($companyId)
    {
        return $this->getSalaryController()->getEmploymentAgreementByCompanyId($companyId);
    }

    /**
     * @return \Alphatrader\ApiBundle\Model\EmploymentAgreementCompactCompany[]|\Alphatrader\ApiBundle\Model\Error
     */
    public function getEmployments()
    {
        return $this->getSalaryController()->getEmploymentAgreements();
    }

    /**
     * @param $companyId
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\SalaryPayment
     */
    public function paySalary($companyId)
    {
        return $this->getSalaryController()->paySalary($companyId);
    }
    
    /**
     * @return SalaryController
     */
    public function getSalaryController()
    {
        return new SalaryController($this->config,$this->jwt);
    }
}