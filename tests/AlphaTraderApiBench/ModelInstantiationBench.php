<?php

namespace AlphaTraderApiBench\Functional;

use Alphatrader\ApiBundle\Model\BankAccount;
use Alphatrader\ApiBundle\Model\BankingLicense;
use Alphatrader\ApiBundle\Model\Bond;
use Alphatrader\ApiBundle\Model\CashTransferLogEntry;
use Alphatrader\ApiBundle\Model\CentralBankReserve;
use Alphatrader\ApiBundle\Model\Ceo;
use Alphatrader\ApiBundle\Model\Chat;
use Alphatrader\ApiBundle\Model\CompactCompany;
use Alphatrader\ApiBundle\Model\Listing;
use Alphatrader\ApiBundle\Model\UserCapabilities;
use Alphatrader\ApiBundle\Model\UserName;

class ModelInstantiationBench
{
    public function benchInstantiationOfBankAccount()
    {
        $this->createBankAccount();
    }

    public function createBankAccount()
    {
        $bankaccount = new BankAccount();
        $bankaccount->setCash('12345');
        $bankaccount->setId('12345');
        return $bankaccount;
    }
    
    public function benchInstantiationOfBankingLicense()
    {
        $bankinglicense = new BankingLicense();
        $bankinglicense->setId('123345');
        $bankinglicense->setCompany($this->createCompactCompany());
    }

    public function benchInstantiationOfBond()
    {
        new Bond();
    }

    public function benchInstantiationOfCashTransferLogEntry()
    {
        new CashTransferLogEntry();
    }

    public function benchInstantiationOfCentralBankReserve()
    {
        new CentralBankReserve();
    }

    public function createUsername()
    {
        return $this->benchInstantiationOfUsername();
    }
    
    public function benchInstantiationOfUsername()
    {
        $username = new UserName();
        $username->setUsername('demo');
        $username->setId('12345');
        return $username;
    }
    
    public function createCompactCompany()
    {
        $company = new CompactCompany();
        $company->setId('12345');
        $company->setName('democompany');
        $company->setSecurityIdentifier('ST12345');
        $company->setSecuritiesAccountId('12345');
        return $company;
    }
    
    public function benchInstantiationOfCompactCompany()
    {
        return $this->createCompactCompany();
    }

    public function createListing()
    {
        $listing = new Listing();
        $listing->setEndDate(new \DateTime());
        $listing->setSecurityIdentifier('ST123456');
        $listing->setStartDate(new \DateTime());
        $listing->setType('STOCK');
        return $listing;
    }

    public function benchInstantiationOfListing()
    {
        return $this->createListing();
    }
    
    public function createCeo()
    {
        return $this->benchInstantiationOfCeo();
    }
    
    public function benchInstantiationOfCeo()
    {
        $ceo = new Ceo();
        $ceo->setId('123445');
        $ceo->setUsername('demo');
        $ceo->setUserCapabilities($this->createUserCapabilities());
        return $ceo;
    }

    public function benchInstantiationOfUserCapabilities()
    {
        $this->createUserCapabilities();
    }
    
    public function createUserCapabilities()
    {
        $usercaps = new UserCapabilities();
        $usercaps->setLocale('de');
        $usercaps->setLevel2User(false);
        $usercaps->setLevel2UserEndDate(123456789);
        $usercaps->setPartner(true);
        $usercaps->setPartnerId('12345');
        $usercaps->setPremium(true);
        $usercaps->setPremiumEndDate(123456789);
        return $usercaps;
    }
    
    public function benchInstantiationOfChats()
    {
        new Chat();
    }
}
