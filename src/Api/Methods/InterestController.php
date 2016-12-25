<?php
/*
 * This file is part of the AlphaTraderApiBundle package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Alphatrader\ApiBundle\Api\Methods;

use Alphatrader\ApiBundle\Api\ApiClient;

/**
 * Class InterestController
 * @package Api\Methods
 * @author ljbergmann <l.bergmann@sky-lab.de>
 */
class InterestController extends ApiClient
{
    /**
     * @param $userId
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\AuthorInterest
     */
    public function getMyAuthorInterest($userId)
    {
        $data = $this->get('v2/my/interests/authors/'.$userId);
        return $this->parseResponse($data, 'Alphatrader\ApiBundle\Model\AuthorInterest');
    }

    /**
     * @param $userId
     * @param $interest
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\AuthorInterest
     */
    public function setMyAuthorInterest($userId, $interest)
    {
        $data = $this->put('v2/my/interests/authors/'.$userId, ['interest' => $interest]);
        return $this->parseResponse($data, 'Alphatrader\ApiBundle\Model\AuthorInterest');
    }

    /**
     * @param $companyId
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\CompanyInterest
     */
    public function getMyCompanyInterest($companyId)
    {
        $data = $this->get('v2/my/interests/companies/'.$companyId);
        return $this->parseResponse($data, 'Alphatrader\ApiBundle\Model\CompanyInterest');
    }

    /**
     * @param $companyId
     * @param $interest
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\CompanyInterest
     */
    public function setMyCompanyInterest($companyId, $interest)
    {
        $data = $this->get('v2/my/interests/companies/'.$companyId, ['interest' => $interest]);
        return $this->parseResponse($data, 'Alphatrader\ApiBundle\Model\CompanyInterest');
    }

    /**
     * @param $hashTag
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\HashTagInterest
     */
    public function getMyHashTagInterest($hashTag)
    {
        $data = $this->get('v2/my/interests/hashtags/'.$hashTag);
        return $this->parseResponse($data, 'Alphatrader\ApiBundle\Model\HashTagInterest');
    }

    /**
     * @param $hashTag
     * @param $interest
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\HashTagInterest
     */
    public function setMyHashTagInterest($hashTag, $interest)
    {
        $data = $this->get('v2/my/interests/hashtags/'.$hashTag, ['interest' => $interest]);
        return $this->parseResponse($data, 'Alphatrader\ApiBundle\Model\HashTagInterest');
    }
}
