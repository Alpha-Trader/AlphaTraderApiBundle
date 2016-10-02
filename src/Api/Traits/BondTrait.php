<?php
namespace Alphatrader\ApiBundle\Api\Traits;

use Alphatrader\ApiBundle\Api\Methods\BondController;
use Alphatrader\ApiBundle\Model\Company;

/**
 * Class BondTrait
 * @package Alphatrader\ApiBundle\Api\Traits
 * @author Tr0nYx
 */
trait BondTrait
{
    /**
     * @param Company   $company
     * @param           $numberOfBonds
     * @param           $faceValue
     * @param           $interestRate
     * @param \DateTime $maturityDate
     *
     * @return \Alphatrader\ApiBundle\Model\Bond
     */
    public function createBond(
        Company $company,
        $numberOfBonds,
        $faceValue,
        $interestRate,
        \DateTime $maturityDate
    ) {
        $controller = $this->getBondController();

        return $controller->createBond(
            $company,
            $numberOfBonds,
            $faceValue,
            $interestRate,
            $this->formatTimeStamp($maturityDate)
        );
    }

    /**
     * @return array
     */
    public function repayBond()
    {
        return $this->getBondController()->repayBond();
    }

    /**
     * @param $bondid
     *
     * @return \Alphatrader\ApiBundle\Model\Bond
     */
    public function getBond($bondid)
    {
        return $this->getBondController()->getBond($bondid);
    }

    /**
     * @return \Alphatrader\ApiBundle\Model\Bond[]|\Alphatrader\ApiBundle\Model\Error
     */
    public function getBonds()
    {
        return $this->getBondController()->getBonds();
    }

    /**
     * @return BondController
     */
    public function getBondController()
    {
        return new BondController($this->config, $this->jwt);
    }
}
