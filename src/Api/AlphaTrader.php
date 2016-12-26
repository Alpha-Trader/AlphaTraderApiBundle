<?php

namespace Alphatrader\ApiBundle\Api;

use Alphatrader\ApiBundle\Api\Traits\PartnerTrait;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

/**
 * Class AlphaTrader
 *
 * @package Alphatrader\ApiBundle\Api
 * @author Tr0nYx
 * @author ljbergmann <l.bergmann@sky-lab.de>
 */
class AlphaTrader
{
    use Traits\BankAccountTrait;
    use Traits\BankingLicenseTrait;
    use Traits\BondTrait;
    use Traits\CashGenerationTrait;
    use Traits\CashTransferLogTrait;
    use Traits\CentralBankReservesTrait;
    use Traits\ChatTrait;
    use Traits\CompanyTrait;
    use Traits\ComplaintTrait;
    use Traits\EventsTrait;
    use Traits\InterestTrait;
    use Traits\LikeTrait;
    use Traits\ListingTrait;
    use Traits\MainInterestRateTrait;
    use Traits\MessageTrait;
    use Traits\NewsTrait;
    use Traits\NotificationTrait;
    use Traits\PartnerTrait;
    use Traits\PortfolioTrait;
    use Traits\PostsTrait;
    use Traits\PriceSpreadTrait;
    use Traits\SalaryTrait;
    use Traits\SearchTrait;
    use Traits\SecurityOrderLogTrait;
    use Traits\SecurityOrderTrait;
    use Traits\StatisticsTrait;
    use Traits\SubscriptionTrait;
    use Traits\SystemBondTrait;
    use Traits\TimeStampTrait;
    use Traits\UserTrait;
    use Traits\VotingTrait;

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
        $this->jwt = $jwt ?: $config['jwt'];
        if (null !== $session->get('_attoken')) {
            $this->jwt = $session->get('_attoken') ?: $jwt;
        }
    }

    /**
     * @param $jwt
     */
    public function setJwt($jwt)
    {
        $this->jwt = $jwt;
    }

    /**
     * @param $url
     */
    public function setApiUrl($url)
    {
        $this->config['apiurl'] = $url;
    }
}
