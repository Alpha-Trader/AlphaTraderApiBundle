<?php

namespace Alphatrader\ApiBundle\Api;

use Alphatrader\ApiBundle\Api\Methods\UserAccountController;
use Alphatrader\ApiBundle\Model\BankAccount;
use Alphatrader\ApiBundle\Model\Bond;
use Alphatrader\ApiBundle\Model\Company;
use Alphatrader\ApiBundle\Model\Error;
use Alphatrader\ApiBundle\Model\Listing;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

/**
 * Class AlphaTrader
 * @package Alphatrader\ApiBundle\Api
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class AlphaTrader extends AbstractAlphaTrader
{
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
     * @return Bankaccount
     */
    public function getBankAccount()
    {
        return $this->getBankAccountController()->getBankAccount();
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
        $controller = $this->getCashTransferLogController();

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
        return $this->getCashGenerationController()->generateCash($cashAmount);
    }

    /**
     * @return \Alphatrader\ApiBundle\Model\Chats[]
     */
    public function getChats()
    {
        return $this->getChatController()->getChats();
    }

    /**
     * @param int $chatID
     *
     * @return \Alphatrader\ApiBundle\Model\Chats
     */
    public function getChat($chatID)
    {
        return $this->getChatController()->getChat($chatID);
    }

    /**
     * @return \Alphatrader\ApiBundle\Model\UserAccount
     */
    public function getCurrentUser()
    {
        return $this->getUserAccountController()->getCurrentUser();
    }

    /**
     * @return \Alphatrader\ApiBundle\Model\UserAccount
     */
    public function getUsers()
    {
        return $this->getUserAccountController()->getUsers();
    }

    /**
     * @param $part
     *
     * @return \Alphatrader\ApiBundle\Model\UserAccount
     */
    public function getUsersByNamePart($part)
    {
        return $this->getUserAccountController()->searchUsersByNamePart($part);
    }

    /**
     * @param string $username
     *
     * @return \Alphatrader\ApiBundle\Model\UserAccount
     */
    public function getUserByUsername($username)
    {
        return $this->getUserAccountController()->getUserByUsername($username);
    }

    /**
     * @param bool $all
     * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
     *
     * @return \AlphaTrader\ApiBundle\Model\Company[]
     */
    public function getCompanies($all = true)
    {
        return $this->getCompanyController()->getCompanies($all);
    }

    /**
     * @param int $companyID
     *
     * @return Company
     */
    public function getCompany($companyID)
    {
        return $this->getCompanyController()->getCompany($companyID);
    }

    /**
     * @param int $userId
     *
     * @return \AlphaTrader\ApiBundle\Model\Company[]
     */
    public function getCompaniesByUserId($userId)
    {
        $user = $this->getUserAccountController()->getUserById($userId);

        return $this->getCompanyController()->getCompanyByUserId($user);
    }

    /**
     * @param string $username
     *
     * @return \AlphaTrader\ApiBundle\Model\Company[]
     */
    public function getCompaniesByUserName($username)
    {
        return $this->getCompanyController()->getCompanyByUserName($username);
    }

    /**
     * @param int $secAccId
     *
     * @return Company
     */
    public function getCompanyBySecurityAccountId($secAccId)
    {
        return $this->getCompanyController()->getCompanyBySecurityAccountId($secAccId);
    }

    /**
     * @param int $secIdent
     *
     * @return Company
     */
    public function getCompanyBySecurityIdentifier($secIdent)
    {
        return $this->getCompanyController()->getCompanyBySecurityIdentifier($secIdent);
    }

    /**
     * @param int $companyId
     *
     * @return \Alphatrader\ApiBundle\Model\CompanyProfile
     */
    public function getCompanyProfile($companyId)
    {
        return $this->getCompanyController()->getCompanyProfile($companyId);
    }

    /**
     * @param $name
     * @param $cashDeposit
     *
     * @return Company
     */
    public function createCompany($name, $cashDeposit)
    {
        return $this->getCompanyController()->createCompany($name, $cashDeposit);
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
        return $this->getUserAccountController()->registerUser($username, $email, $password);
    }

    /**
     * @param $username
     * @param $password
     *
     * @return mixed
     */
    public function getUserJwt($username, $password)
    {
        return $this->getUserAccountController()->getUserToken($username, $password);
    }

    /**
     * @param $username
     *
     * @return \Alphatrader\ApiBundle\Model\UserProfile
     */
    public function getUserProfile($username)
    {
        return $this->getUserAccountController()->getUserProfile($username);
    }

    /**
     * @param \DateTime $afterDate
     *
     * @return \Alphatrader\ApiBundle\Model\Events[]
     */
    public function getEvents(\DateTime $afterDate = null)
    {
        return $this->getEventController()->getEvents($this->formatTimeStamp($afterDate));
    }

    /**
     * @param           $realms
     * @param \DateTime $afterDate
     *
     * @return \Alphatrader\ApiBundle\Model\Events[]
     */
    public function getEventsByRealms($realms, \DateTime $afterDate = null)
    {
        return $this->getEventController()->searchEvents($realms, $this->formatTimeStamp($afterDate));
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
        return $this->getEventController()->searchEventsByType($eventtype, $realms, $this->formatTimeStamp($afterDate));
    }

    /**
     * @param $secAccId
     *
     * @return \Alphatrader\ApiBundle\Model\Portfolio
     */
    public function getPortfolio($secAccId)
    {
        return $this->getPortfolioController()->getPortfolio($secAccId);
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
        return $this->getListingController()->getProfile($securityIdent);
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
        $controller = $this->getSecurityOrderLogController();

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
     * @return Bond
     */
    public function getBond($bondid)
    {
        return $this->getBondController()->getBond($bondid);
    }

    /**
     * @param Company $company
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
     * @return Bond
     */
    public function getSystemBond($bondid)
    {
        return $this->getSystemBondController()->getBond($bondid);
    }

    /**
     * @param Company $company
     *
     * @return \Alphatrader\ApiBundle\Model\BankingLicense
     */
    public function createBankingLicense(Company $company)
    {
        return $this->getBankingLicenseController()->createBankingLicense($company);
    }

    /**
     * @param Company $company
     *
     * @return \Alphatrader\ApiBundle\Model\BankingLicense
     */
    public function getBankingLicense(Company $company)
    {
        return $this->getBankingLicenseController()->getBankingLicense($company);
    }

    /**
     * @return \Alphatrader\ApiBundle\Model\MainInterestRate[]
     */
    public function getMainInterestRate()
    {
        return $this->getMainInterestRateController()->getMainInterestRate();
    }

    /**
     * @return \Alphatrader\ApiBundle\Model\MainInterestRate
     */
    public function getLatestMainInterestRate()
    {
        return $this->getMainInterestRateController()->getLatestMainInterestRate();
    }

    /**
     * @param $reserveid
     *
     * @return \Alphatrader\ApiBundle\Model\CentralBankReserve
     */
    public function getCentralBankReservesById($reserveid)
    {
        return $this->getCentralBankReservesController()->getReserveById($reserveid);
    }

    /**
     * @return mixed
     */
    public function setNotificationsasRead()
    {
        return $this->getNotificationsController()->markAsRead();
    }

    /**
     * @return \Alphatrader\ApiBundle\Model\Notifications[]
     */
    public function getNotifications()
    {
        return $this->getNotificationsController()->getNotifications();
    }

    /**
     * @return \Alphatrader\ApiBundle\Model\Notifications[]|Error
     */
    public function getUnreadNotifications()
    {
        return $this->getNotificationsController()->getUnreadNotifications();
    }

    /**
     * @param $secIdent
     *
     * @return \Alphatrader\ApiBundle\Model\SecurityOrder
     */
    public function getOrder($secIdent)
    {
        return $this->getSecurityOrderContrller()->getSecurityOrder($secIdent);
    }

    /**
     * @param $owner
     * @param $secIdent
     * @param $action
     * @param $type
     * @param $price
     * @param $numberOfShares
     * @param $counterparty
     *
     * @return \Alphatrader\ApiBundle\Model\SecurityOrder
     */
    public function createOrder($owner, $secIdent, $action, $type, $price, $numberOfShares, $counterparty)
    {
        return $this->getSecurityOrderContrller()->createSecurityOrder(
            $owner,
            $secIdent,
            $action,
            $type,
            $price,
            $numberOfShares,
            $counterparty
        );
    }
}
