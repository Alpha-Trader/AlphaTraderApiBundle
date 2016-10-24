<?php

namespace Alphatrader\ApiBundle\Api;

use Symfony\Component\HttpFoundation\Session\SessionInterface;

/**
 * Class AlphaTrader
 * @package Alphatrader\ApiBundle\Api
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
    use Traits\ListingTrait;
    use Traits\MainInterestRateTrait;
    use Traits\MessageTrait;
    use Traits\NotificationTrait;
    use Traits\PortfolioTrait;
    use Traits\SecurityOrderLogTrait;
    use Traits\SecurityOrderTrait;
    use Traits\SystemBondTrait;
    use Traits\UserTrait;
    use Traits\TimeStampTrait;
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
        if ($session !== null) {
            $this->jwt = $session->get('_attoken') ? : $jwt;
        }
    }

    /**
     * @param $jwt
     */
    public function setJwt($jwt)
    {
        $this->jwt = $jwt;
    }
}
