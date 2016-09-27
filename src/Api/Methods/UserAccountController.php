<?php

/*
 * This file is part of the AlphaTraderApiBundle package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Alphatrader\ApiBundle\Api\Methods;

use Alphatrader\ApiBundle\Api\ApiClient;
use Alphatrader\ApiBundle\Model\UserAccount;

/**
 * Class BankAccountController
 * @package AlphaTrader\API\Controller
 * @author Tr0nYx <tronyx@bric.finance>
 */
class UserAccountController extends ApiClient
{
    /**
     * @return UserAccount
     */
    public function getCurrentUser()
    {
        $data = $this->get('user');
        $oResult = $this->serializer->deserialize($data, 'Alphatrader\ApiBundle\Model\UserAccount', 'json');
        return $oResult;
    }

    /**
     * @return UserAccount
     */
    public function getUsers()
    {
        $data = $this->get('users');
        $oResult = $this->serializer->deserialize($data, 'Alphatrader\ApiBundle\Model\UserAccount', 'json');
        return $oResult;
    }

    /**
     * @param $part
     *
     * @return UserAccount
     */
    public function searchUsersByNamePart($part)
    {
        $data = $this->get('users/' . $part);
        $oResult = $this->serializer->deserialize(
            $data,
            'ArrayCollection<Alphatrader\ApiBundle\Model\UserAccount>',
            'json'
        );
        return $oResult;
    }

    /**
     * @param $username
     *
     * @return UserAccount
     */
    public function getUserByUsername($username)
    {
        $data = $this->get('users/' . $username);
        $oResult = $this->serializer->deserialize($data, 'Alphatrader\ApiBundle\Model\UserAccount', 'json');
        return $oResult;
    }

    /**
     * @param $userid
     *
     * @return UserAccount
     */
    public function getUserById($userid)
    {
        $data = $this->get('users/' . $userid);
        $oResult = $this->serializer->deserialize($data, 'Alphatrader\ApiBundle\Model\UserAccount', 'json');
        return $oResult;
    }

    /**
     * @param $username
     *
     * @return mixed
     */
    public function getUserProfile($username)
    {
        $data = $this->get('userprofiles/' . $username);
        $oResult = $this->serializer->deserialize($data, 'Alphatrader\ApiBundle\Model\UserProfile', 'json');
        return $oResult;
    }

    /**
     * @param $username
     * @param $email
     * @param $password
     *
     * @return UserAccount
     */
    public function registerUser($username, $email, $password)
    {
        $data = $this->post(
            $this->config['apiurl'] . '/user/register',
            [],
            ['username' => $username, 'emailAddress' => $email, 'password' => $password]
        );
        $oResult = $this->serializer->deserialize($data, 'Alphatrader\ApiBundle\Model\UserAccount', 'json');
        return $oResult;
    }

    /**
     * @param $username
     * @param $password
     *
     * @return mixed
     */
    public function getUserToken($username, $password)
    {
        $data = $this->post(
            $this->config['apiurl'] . '/user/token/',
            [],
            ['username' => $username, 'password' => $password]
        );
        $json = json_decode($data);
        return $json->message;
    }
}
