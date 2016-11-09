<?php
namespace Alphatrader\ApiBundle\Api\Traits;

use Alphatrader\ApiBundle\Api\Methods\SystemBondController;
use Alphatrader\ApiBundle\Model\Company;
use Alphatrader\ApiBundle\Model\Listing;

/**
 * Class SystemBondTrait
 *
 * @package Alphatrader\ApiBundle\Api\Traits
 * @author  Tr0nYx
 */
trait SystemBondTrait
{
    /**
     * @param Company       $company
     * @param         $numberOfBonds
     *
     * @return Listing
     */
    public function createSystemBond(Company $company, $numberOfBonds)
    {
        $controller = $this->getSystemBondController();

        return $controller->createBond(
            $company,
            $numberOfBonds
        );
    }

    /**
     * @return array
     */
    public function repaySystemBond()
    {
        return $this->getSystemBondController()->repayBond();
    }

    /**
     * @param $bondid
     *
     * @return \Alphatrader\ApiBundle\Model\Bond
     */
    public function getSystemBond($bondid)
    {
        return $this->getSystemBondController()->getBond($bondid);
    }

    /**
     * @return SystemBondController
     */
    public function getSystemBondController()
    {
        return new SystemBondController($this->config, $this->jwt);
    }
}
