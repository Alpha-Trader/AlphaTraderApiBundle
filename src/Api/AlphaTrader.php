<?php

namespace Alphatrader\ApiBundle\Api;

use Alphatrader\ApiBundle\Api\Methods\UserAccountController;
use Alphatrader\ApiBundle\Model\BankAccount;
use Alphatrader\ApiBundle\Model\Bond;
use Alphatrader\ApiBundle\Model\Company;
use Alphatrader\ApiBundle\Model\Listing;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

/**
 * Class AlphaTrader
 * @package Alphatrader\ApiBundle\Api
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class AlphaTrader
{
    protected $config;
    protected $jwt;

    /**
     * @param                  $config
     * @param SessionInterface $session
     * @param null             $jwt
     */
    public function __construct($config, SessionInterface $session = null, $jwt = null)
    {
        $this->config = $config;
        if ($session != null) {
            $this->jwt = $session->get('_attoken') ? : $jwt;
        }
    }

    /**
     * @param $time
     *
     * @return int|string
     */
    private function formatTimeStamp($time)
    {
        return $time instanceof \DateTime ? ($time->getTimestamp() * 1000) : ((int)$time * 1000);
    }

    /**
     * @return Bankaccount
     */
    public function getBankAccount()
    {
        $controller = new Methods\BankAccountController($this->config, $this->jwt);
        return $controller->getBankAccount();
    }

    /**
     * @param \DateTime $startDate
     * @param \DateTime $endDate
     * @param null      $senderBankAccId
     * @param null      $receiverBankAccId
     *
     * @return \Alphatrader\ApiBundle\Model\CashTransferLogEntry[]
     */
    public function getCashTransferLogs(
        \DateTime $startDate = null,
        \DateTime $endDate = null,
        $senderBankAccId = null,
        $receiverBankAccId = null
    ) {
        $controller = new Methods\CashTransferLogController($this->config, $this->jwt);
        return $controller->getCashTransferLogs(
            $this->formatTimeStamp($startDate),
            $this->formatTimeStamp($endDate),
            $senderBankAccId,
            $receiverBankAccId
        );
    }

    /**
     * @param $cashAmount
     *
     * @return BankAccount
     */
    public function generateCash($cashAmount)
    {
        $controller = new Methods\CashGenerationController($this->config, $this->jwt);
        return $controller->generateCash($cashAmount);
    }

    /**
     * @return \Alphatrader\ApiBundle\Model\Chats[]
     */
    public function getChats()
    {
        $controller = new Methods\ChatController($this->config, $this->jwt);
        return $controller->getChats();
    }

    /**
     * @param int $chatID
     *
     * @return \Alphatrader\ApiBundle\Model\Chats
     */
    public function getChat($chatID)
    {
        $controller = new Methods\ChatController($this->config, $this->jwt);
        return $controller->getChat($chatID);
    }

    /**
     * @return \Alphatrader\ApiBundle\Model\UserAccount
     */
    public function getCurrentUser()
    {
        $controller = new Methods\UserAccountController($this->config, $this->jwt);
        return $controller->getCurrentUser();
    }

    /**
     * @return \Alphatrader\ApiBundle\Model\UserAccount
     */
    public function getUsers()
    {
        /** @var UserAccountController $controller */
        $controller = new Methods\UserAccountController($this->config, $this->jwt);
        return $controller->getUsers();
    }

    /**
     * @param $part
     *
     * @return \Alphatrader\ApiBundle\Model\UserAccount
     */
    public function getUsersByNamePart($part)
    {
        $controller = new Methods\UserAccountController($this->config, $this->jwt);
        return $controller->searchUsersByNamePart($part);
    }

    /**
     * @param string $username
     *
     * @return \Alphatrader\ApiBundle\Model\UserAccount
     */
    public function getUserByUsername($username)
    {
        $controller = new Methods\UserAccountController($this->config, $this->jwt);
        return $controller->getUserByUsername($username);
    }

    /**
     * @param bool $all
     * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
     *
     * @return \AlphaTrader\ApiBundle\Model\Company[]
     */
    public function getCompanies($all = true)
    {
        $controller = new Methods\CompanyController($this->config, $this->jwt);
        return $controller->getCompanies($all);
    }

    /**
     * @param int $companyID
     *
     * @return Company
     */
    public function getCompany($companyID)
    {
        $controller = new Methods\CompanyController($this->config, $this->jwt);
        return $controller->getCompany($companyID);
    }

    /**
     * @param int $userId
     *
     * @return \AlphaTrader\ApiBundle\Model\Company[]
     */
    public function getCompaniesByUserId($userId)
    {
        $controller = new Methods\CompanyController($this->config, $this->jwt);
        return $controller->getCompanyByUserId($userId);
    }

    /**
     * @param string $username
     *
     * @return \AlphaTrader\ApiBundle\Model\Company[]
     */
    public function getCompaniesByUserName($username)
    {
        $controller = new Methods\CompanyController($this->config, $this->jwt);
        return $controller->getCompanyByUserName($username);
    }

    /**
     * @param int $secAccId
     *
     * @return Company
     */
    public function getCompanyBySecurityAccountId($secAccId)
    {
        $controller = new Methods\CompanyController($this->config, $this->jwt);
        return $controller->getCompanyBySecurityAccountId($secAccId);
    }

    /**
     * @param int $secIdent
     *
     * @return Company
     */
    public function getCompanyBySecurityIdentifier($secIdent)
    {
        $controller = new Methods\CompanyController($this->config, $this->jwt);
        return $controller->getCompanyBySecurityIdentifier($secIdent);
    }

    /**
     * @param int $companyId
     *
     * @return \Alphatrader\ApiBundle\Model\CompanyProfile
     */
    public function getCompanyProfile($companyId)
    {
        $controller = new Methods\CompanyController($this->config, $this->jwt);
        return $controller->getCompanyProfile($companyId);
    }

    /**
     * @param $name
     * @param $cashDeposit
     *
     * @return Company
     */
    public function createCompany($name, $cashDeposit)
    {
        $controller = new Methods\CompanyController($this->config, $this->jwt);
        return $controller->createCompany($name, $cashDeposit);
    }

    /**
     * @param $username
     * @param $email
     * @param $password
     *
     * @return \Alphatrader\ApiBundle\Model\UserAccount
     */
    public function registerUser($username, $email, $password)
    {
        $controller = new Methods\UserAccountController($this->config, $this->jwt);
        return $controller->registerUser($username, $email, $password);
    }

    /**
     * @param $username
     * @param $password
     *
     * @return mixed
     */
    public function getUserJwt($username, $password)
    {
        $controller = new Methods\UserAccountController($this->config, $this->jwt);
        return $controller->getUserToken($username, $password);
    }

    /**
     * @param $username
     *
     * @return \Alphatrader\ApiBundle\Model\UserProfile
     */
    public function getUserProfile($username)
    {
        $controller = new Methods\UserAccountController($this->config, $this->jwt);
        return $controller->getUserProfile($username);
    }

    /**
     * @param \DateTime $afterDate
     *
     * @return \Alphatrader\ApiBundle\Model\Events[]
     */
    public function getEvents(\DateTime $afterDate = null)
    {
        $controller = new Methods\EventController($this->config, $this->jwt);
        return $controller->getEvents($this->formatTimeStamp($afterDate));
    }

    /**
     * @param           $realms
     * @param \DateTime $afterDate
     *
     * @return \Alphatrader\ApiBundle\Model\Events[]
     */
    public function getEventsByRealms($realms, \DateTime $afterDate = null)
    {
        $controller = new Methods\EventController($this->config, $this->jwt);
        return $controller->searchEvents($realms, $this->formatTimeStamp($afterDate));
    }

    /**
     * @param           $eventtype
     * @param string    $realms
     * @param \DateTime $afterDate
     *
     * @return \Alphatrader\ApiBundle\Model\Events[]
     */
    public function getEventsByType($eventtype, $realms = '', \DateTime $afterDate = null)
    {
        $controller = new Methods\EventController($this->config, $this->jwt);
        return $controller->searchEventsByType($eventtype, $realms, $this->formatTimeStamp($afterDate));
    }

    /**
     * @param $secAccId
     *
     * @return \Alphatrader\ApiBundle\Model\Portfolio
     */
    public function getPortfolio($secAccId)
    {
        $controller = new Methods\PortfolioController($this->config, $this->jwt);
        return $controller->getPortfolio($secAccId);
    }

    /**
     * @param $secIdentPart
     *
     * @return \Alphatrader\ApiBundle\Model\Listing[]
     */
    public function getListing($secIdentPart)
    {
        $controller = new Methods\ListingController($this->config, $this->jwt);
        return $controller->getListing($secIdentPart);
    }

    /**
     * @param $securityIdent
     *
     * @return \Alphatrader\ApiBundle\Model\ListingProfile
     */
    public function getListingProfile($securityIdent)
    {
        $controller = new Methods\ListingController($this->config, $this->jwt);
        return $controller->getProfile($securityIdent);
    }

    /**
     * @param string    $securityIdentifier
     * @param \DateTime $startDate
     * @param \DateTime $endDate
     * @param string    $buyerSecAccId
     * @param string    $sellerSecAccId
     *
     * @return \Alphatrader\ApiBundle\Model\SecurityOrderLogEntry[]
     */
    public function getSecurityOrderLogs(
        $securityIdentifier = '',
        \DateTime $startDate = null,
        \DateTime $endDate = null,
        $buyerSecAccId = '',
        $sellerSecAccId = ''
    ) {
        $controller = new Methods\SecurityOrderLogController($this->config, $this->jwt);
        return $controller->getSecurityOrderLogs(
            $securityIdentifier,
            $this->formatTimeStamp($startDate),
            $this->formatTimeStamp($endDate),
            $buyerSecAccId,
            $sellerSecAccId
        );
    }

    /**
     * @param Company   $company
     * @param           $numberOfBonds
     * @param           $faceValue
     * @param           $interestRate
     * @param \DateTime $maturityDate
     *
     * @return Bond
     */
    public function createBond(
        Company $company,
        $numberOfBonds,
        $faceValue,
        $interestRate,
        \DateTime $maturityDate
    ) {
        $controller = new Methods\BondController($this->config, $this->jwt);
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
        $controller = new Methods\BondController($this->config, $this->jwt);
        return $controller->repayBond();
    }

    /**
     * @param $bondid
     *
     * @return Bond
     */
    public function getBond($bondid)
    {
        $controller = new Methods\BondController($this->config, $this->jwt);
        return $controller->getBond($bondid);
    }

    /**
     * @param Company $company
     * @param         $numberOfBonds
     *
     * @return Listing
     */
    public function createSystemBond(Company $company, $numberOfBonds)
    {
        $controller = new Methods\SystemBondController($this->config, $this->jwt);
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
        $controller = new Methods\SystemBondController($this->config, $this->jwt);
        return $controller->repayBond();
    }

    /**
     * @param $bondid
     *
     * @return Bond
     */
    public function getSystemBond($bondid)
    {
        $controller = new Methods\SystemBondController($this->config, $this->jwt);
        return $controller->getBond($bondid);
    }

    /**
     * @param Company $company
     *
     * @return \Alphatrader\ApiBundle\Model\BankingLicense
     */
    public function createBankingLicense(Company $company)
    {
        $controller = new Methods\BankingLicenseController($this->config, $this->jwt);
        return $controller->createBankingLicense($company);
    }

    /**
     * @param Company $company
     *
     * @return \Alphatrader\ApiBundle\Model\BankingLicense
     */
    public function getBankingLicense(Company $company)
    {
        $controller = new Methods\BankingLicenseController($this->config, $this->jwt);
        return $controller->getBankingLicense($company);
    }

    /**
     * @return \Alphatrader\ApiBundle\Model\MainInterestRate[]
     */
    public function getMainInterestRate()
    {
        $controller = new Methods\MainInterestRateController($this->config, $this->jwt);
        return $controller->getMainInterestRate();
    }

    /**
     * @return \Alphatrader\ApiBundle\Model\MainInterestRate
     */
    public function getLatestMainInterestRate()
    {
        $controller = new Methods\MainInterestRateController($this->config, $this->jwt);
        return $controller->getLatestMainInterestRate();
    }

    /**
     * @param $reserveid
     *
     * @return \Alphatrader\ApiBundle\Model\CentralBankReserve
     */
    public function getCentralBankReservesById($reserveid)
    {
        $controller = new Methods\CentralBankReservesController($this->config, $this->jwt);
        return $controller->getReserveById($reserveid);
    }

    /**
     * @return mixed
     */
    public function setNotificationsasRead()
    {
        $controller = new Methods\NotificationsController($this->config, $this->jwt);
        return $controller->markAsRead();
    }

    /**
     * @return \Alphatrader\ApiBundle\Model\Notifications[]
     */
    public function getNotifications()
    {
        $controller = new Methods\NotificationsController($this->config, $this->jwt);
        return $controller->getNotifications();
    }

    /**
     * @param $secIdent
     *
     * @return \Alphatrader\ApiBundle\Model\SecurityOrder
     */
    public function getOrder($secIdent)
    {
        $controller = new Methods\SecurityOrderController($this->config, $this->jwt);
        return $controller->getSecurityOrder($secIdent);
    }
}
