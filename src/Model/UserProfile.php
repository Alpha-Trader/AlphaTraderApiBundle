<?php

namespace Alphatrader\ApiBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation;

/**
* Class UserProfile
 *
 * @package Alphatrader\ApiBundle\Model
 * @author  Tr0nYx
 */
class UserProfile
{
    /**
     * @var BankAccount
     * @Annotation\Type("Alphatrader\ApiBundle\Model\BankAccount")
     * @Annotation\SerializedName("bankAccount")
     */
    private $bankAccount;

    /**
     * @var CashTransferLogEntry[]
     * @Annotation\Type("ArrayCollection<Alphatrader\ApiBundle\Model\CashTransferLogEntry>")
     * @Annotation\SerializedName("cashTransferLogs")
     */
    private $cashTransferLogs;

    /**
     * @var EmploymentAgreementCompactCompany[]
     * @Annotation\Type("ArrayCollection<Alphatrader\ApiBundle\Model\EmploymentAgreementCompactCompany>")
     * @Annotation\SerializedName("employments")
     */
    private $employments;

    /**
     * @var Events[]
     * @Annotation\Type("ArrayCollection<Alphatrader\ApiBundle\Model\Events>")
     * @Annotation\SerializedName("events")
     */
    private $events;

    /**
     * @var AbstractPoll[]
     * @Annotation\Type("ArrayCollection<Alphatrader\ApiBundle\Model\AbstractPoll>")
     * @Annotation\SerializedName("initiatedPolls")
     */
    private $initiatedPolls;

    /**
     * @var string
     * @Annotation\Type("string")
     * @Annotation\SerializedName("locale")
     */
    private $locale;

    /**
     * @var AbstractPoll[]
     * @Annotation\Type("ArrayCollection<Alphatrader\ApiBundle\Model\AbstractPoll>")
     * @Annotation\SerializedName("polls")
     */
    private $polls;

    /**
     * @var SalaryPayment[]
     * @Annotation\Type("ArrayCollection<Alphatrader\ApiBundle\Model\SalaryPayment>")
     * @Annotation\SerializedName("salaryPayments")
     */
    private $salaryPayments;

    /**
     * @var UserName
     * @Annotation\Type("Alphatrader\ApiBundle\Model\UserName")
     * @Annotation\SerializedName("user")
     */
    private $user;

    /**
     * @var UserCapabilities
     * @Annotation\Type("Alphatrader\ApiBundle\Model\UserCapabilities")
     * @Annotation\SerializedName("userCapabilities")
     */
    private $userCapabilities;

    /**
     * @return BankAccount
     */
    public function getBankAccount()
    {
        return $this->bankAccount;
    }

    /**
     * @param BankAccount $bankAccount
     */
    public function setBankAccount($bankAccount)
    {
        $this->bankAccount = $bankAccount;
    }

    /**
     * @return ArrayCollection<CashTransferLogEntry>
     */
    public function getCashTransferLogs()
    {
        return $this->cashTransferLogs;
    }

    /**
     * @param CashTransferLogEntry[] $cashTransferLogs
     */
    public function setCashTransferLogs($cashTransferLogs)
    {
        $this->cashTransferLogs = $cashTransferLogs;
    }

    /**
     * @return ArrayCollection<EmploymentAgreementCompactCompany>
     */
    public function getEmployments()
    {
        return $this->employments;
    }

    /**
     * @param EmploymentAgreementCompactCompany[] $employments
     */
    public function setEmployments($employments)
    {
        $this->employments = $employments;
    }

    /**
     * @return ArrayCollection<Events>
     */
    public function getEvents()
    {
        return $this->events;
    }

    /**
     * @param Events[] $events
     */
    public function setEvents($events)
    {
        $this->events = $events;
    }

    /**
     * @return ArrayCollection<AbstractPoll>
     */
    public function getInitiatedPolls()
    {
        return $this->initiatedPolls;
    }

    /**
     * @param AbstractPoll[] $initiatedPolls
     */
    public function setInitiatedPolls($initiatedPolls)
    {
        $this->initiatedPolls = $initiatedPolls;
    }

    /**
     * @return string
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * @param string $locale
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;
    }

    /**
     * @return ArrayCollection<AbstractPoll>
     */
    public function getPolls()
    {
        return $this->polls;
    }

    /**
     * @param AbstractPoll[] $polls
     */
    public function setPolls($polls)
    {
        $this->polls = $polls;
    }

    /**
     * @return ArrayCollection<SalaryPayment>
     */
    public function getSalaryPayments()
    {
        return $this->salaryPayments;
    }

    /**
     * @param SalaryPayment[] $salaryPayments
     */
    public function setSalaryPayments($salaryPayments)
    {
        $this->salaryPayments = $salaryPayments;
    }

    /**
     * @return UserName
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param UserName $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return UserCapabilities
     */
    public function getUserCapabilities()
    {
        return $this->userCapabilities;
    }

    /**
     * @param UserCapabilities $userCapabilities
     */
    public function setUserCapabilities($userCapabilities)
    {
        $this->userCapabilities = $userCapabilities;
    }

    /**
     * @return float
     */
    public function getDailyWage()
    {
        $dailyWage = 0.00;
        if (!is_array($this->getEmployments())) {
            return $dailyWage;
        }

        foreach ($this->getEmployments() as $employment) {
            $dailyWage += $employment->getDailyWage();
        }
        return $dailyWage;
    }

    /**
     * @return null
     */
    public function getFirstEmploymentDate()
    {
        if (null === $this->getEmployments()|| true === $this->getEmployments()->isEmpty()) {
            return null;
        }
        return $this->getEmployments()->first()->getStartDate();
    }
}
