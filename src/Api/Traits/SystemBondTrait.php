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
     * @param $bondid
     *
     * @return \Alphatrader\ApiBundle\Model\SystemBond
     */
    public function getSystemBonds()
    {
        return $this->getSystemBondController()->getBonds();
    }
    
    /**
     * @param $bondid
     *
     * @return \Alphatrader\ApiBundle\Model\SystemBond
     */
    public function getSystemBond($bondid)
    {
        return $this->getSystemBondController()->getBond($bondid);
    }

    /**
     * @param $secIdent
     * @return \Alphatrader\ApiBundle\Model\SystemBond|\Alphatrader\ApiBundle\Model\Error
     */
    public function getSystemBondBySecIdent($secIdent)
    {
        return $this->getSystemBondController()->getBondBySecurityIdentifier($secIdent);
    }
    
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
     * @return SystemBondController
     */
    public function getSystemBondController()
    {
        return new SystemBondController($this->config, $this->jwt);
    }
}
