<?php
/*
 * This file is part of the AlphaTraderApiBundle package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Alphatrader\ApiBundle\Api\Methods;

use Alphatrader\ApiBundle\Api\ApiClient;

/**
 * Class PriceSpreadController
 * @package AlphaTrader\API\Controller
 * @author ljbergmann <l.bergmann@sky-lab.de>
 */
class SalaryController extends ApiClient
{
    /**
     * @param $companyId
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\EmploymentAgreement
     */
    public function getEmploymentAgreementByCompanyId($companyId)
    {
        $data = $this->get('employmentagreement/company/'. $companyId);
        return $this->parseResponse($data, 'Alphatrader\ApiBundle\Model\EmploymentAgreement');
    }

    /**
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\EmploymentAgreementCompactCompany[]
     */
    public function getEmploymentAgreements()
    {
        $data = $this->get('employmentagreement/');
        return $this->parseResponse($data, 'ArrayCollection<Alphatrader\ApiBundle\Model\EmploymentAgreementCompactCompany>');
    }

    /**
     * @param $companyId
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\SalaryPayment
     */
    public function paySalary($companyId)
    {
        $data = $this->post('salarypayments/company/'.$companyId);
        return $this->parseResponse($data, 'Alphatrader\ApiBundle\Model\SalaryPayment');
    }
}
