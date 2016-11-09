<?php

namespace Alphatrader\ApiBundle\Model;

use JMS\Serializer\Annotation;

/**
 * Class Bond
 *
 * @package                            Alphatrader\ApiBundle\Model
 * @Annotation\ExclusionPolicy("none")
 */
class Bond
{
    use BondTrait;
    
    /**
     * @Annotation\Type("Alphatrader\ApiBundle\Model\CompanyName")
     * @Annotation\SerializedName("issuer")
     */
    private $issuer;


    /**
     * @return CompanyName
     */
    public function getIssuer()
    {
        return $this->issuer;
    }

    /**
     * @param CompanyName $issuer
     */
    public function setIssuer($issuer)
    {
        $this->issuer = $issuer;
    }
}
