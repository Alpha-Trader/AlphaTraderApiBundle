<?php

namespace Alphatrader\ApiBundle\Api;

use Alphatrader\ApiBundle\Api\Methods\BankAccountController;
use Alphatrader\ApiBundle\Api\Methods\BankingLicenseController;
use Alphatrader\ApiBundle\Api\Methods\BondController;
use Alphatrader\ApiBundle\Api\Methods\CashGenerationController;
use Alphatrader\ApiBundle\Api\Methods\CashTransferLogController;
use Alphatrader\ApiBundle\Api\Methods\CentralBankReservesController;
use Alphatrader\ApiBundle\Api\Methods\ChatController;
use Alphatrader\ApiBundle\Api\Methods\CompanyController;
use Alphatrader\ApiBundle\Api\Methods\EventController;
use Alphatrader\ApiBundle\Api\Methods\ListingController;
use Alphatrader\ApiBundle\Api\Methods\MainInterestRateController;
use Alphatrader\ApiBundle\Api\Methods\NotificationsController;
use Alphatrader\ApiBundle\Api\Methods\PortfolioController;
use Alphatrader\ApiBundle\Api\Methods\SecurityOrderController;
use Alphatrader\ApiBundle\Api\Methods\SecurityOrderLogController;
use Alphatrader\ApiBundle\Api\Methods\SystemBondController;
use Alphatrader\ApiBundle\Api\Methods\UserAccountController;
use Alphatrader\ApiBundle\Api\Methods\VotingController;

/**
 * Class AlphaTrader
 * @package Alphatrader\ApiBundle\Api
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
abstract class AbstractAlphaTrader
{
    protected $config;
    
    protected $jwt;

    /**
     * @param $time
     *
     * @return int|string
     */
    protected function formatTimeStamp($time)
    {
        return $time ?: ($time instanceof \DateTime ? ($time->getTimestamp() * 1000) : ((int)$time * 1000)) ?: null;
    }
    
    /**
     * @return BankAccountController
     */
    public function getBankAccountController()
    {
        return new BankAccountController($this->config, $this->jwt);
    }

    /**
     * @return CashTransferLogController
     */
    public function getCashTransferLogController()
    {
        
        return new CashTransferLogController($this->config, $this->jwt);
    }

    /**
     * @return CashGenerationController
     */
    public function getCashGenerationController()
    {
        return new CashGenerationController($this->config, $this->jwt);
    }

    /**
     * @return ChatController
     */
    public function getChatController()
    {
        return new ChatController($this->config, $this->jwt);
    }

    /**
     * @return UserAccountController
     */
    public function getUserAccountController()
    {
        return new UserAccountController($this->config, $this->jwt);
    }

    /**
     * @return CompanyController
     */
    public function getCompanyController()
    {
        return new CompanyController($this->config, $this->jwt);
    }

    /**
     * @return EventController
     */
    public function getEventController()
    {
        return new EventController($this->config, $this->jwt);
    }

    /**
     * @return PortfolioController
     */
    public function getPortfolioController()
    {
        return new PortfolioController($this->config, $this->jwt);
    }

    /**
     * @return ListingController
     */
    public function getListingController()
    {
        return new ListingController($this->config, $this->jwt);
    }

    /**
     * @return SecurityOrderLogController
     */
    public function getSecurityOrderLogController()
    {
        return new SecurityOrderLogController($this->config, $this->jwt);
    }

    /**
     * @return BondController
     */
    public function getBondController()
    {
        return new BondController($this->config, $this->jwt);
    }

    /**
     * @return SystemBondController
     */
    public function getSystemBondController()
    {
        return new SystemBondController($this->config, $this->jwt);
    }

    /**
     * @return BankingLicenseController
     */
    public function getBankingLicenseController()
    {
        return new BankingLicenseController($this->config, $this->jwt);
    }

    /**
     * @return MainInterestRateController
     */
    public function getMainInterestRateController()
    {
        return new MainInterestRateController($this->config, $this->jwt);
    }

    /**
     * @return CentralBankReservesController
     */
    public function getCentralBankReservesController()
    {
        return new CentralBankReservesController($this->config, $this->jwt);
    }

    /**
     * @return NotificationsController
     */
    public function getNotificationsController()
    {
        return new NotificationsController($this->config, $this->jwt);
    }

    /**
     * @return SecurityOrderController
     */
    public function getSecurityOrderContrller()
    {
        return new SecurityOrderController($this->config, $this->jwt);
    }

    /**
     * @return VotingController
     */
    public function getVotingController()
    {
        return new VotingController($this->config, $this->jwt);
    }
}
