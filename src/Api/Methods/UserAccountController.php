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
 * Class BankAccountController
 *
 * @package AlphaTrader\API\Controller
 * @author  Tr0nYx <tronyx@bric.finance>
 */
class UserAccountController extends ApiClient
{
    /**
     * @return \Alphatrader\ApiBundle\Model\UserAccount|\Alphatrader\ApiBundle\Model\Error
     */
    public function getCurrentUser()
    {
        $data = $this->get('user');
        return $this->parseResponse($data, 'Alphatrader\ApiBundle\Model\UserAccount');
    }

    /**
     * @param $userid
     *
     * @return \Alphatrader\ApiBundle\Model\UserAccount|\Alphatrader\ApiBundle\Model\Error
     */
    public function getUserById($userid)
    {
        $data = $this->get('users/' . $userid);
        return $this->parseResponse($data, 'Alphatrader\ApiBundle\Model\UserAccount');
    }
    
    /**
     * @return \Alphatrader\ApiBundle\Model\UserAccount[]|\Alphatrader\ApiBundle\Model\Error
     */
    public function getUsers()
    {
        $data = $this->get('users');
        return $this->parseResponse($data, 'ArrayCollection<Alphatrader\ApiBundle\Model\UserAccount>');
    }

    /**
     * @param $part
     *
     * @return \Alphatrader\ApiBundle\Model\UserAccount[]|\Alphatrader\ApiBundle\Model\Error
     */
    public function searchUsersByNamePart($part)
    {
        $data = $this->get('users/' . $part);
        return $this->parseResponse($data, 'ArrayCollection<Alphatrader\ApiBundle\Model\UserAccount>');
    }

    /**
     * @param $username
     *
     * @return \Alphatrader\ApiBundle\Model\UserAccount|\Alphatrader\ApiBundle\Model\Error
     */
    public function getUserByUsername($username)
    {
        $data = $this->get('users/username/' . $username);
        return $this->parseResponse($data, 'Alphatrader\ApiBundle\Model\UserAccount');
    }
    
    /**
     * @param $username
     *
     * @return \Alphatrader\ApiBundle\Model\UserProfile|\Alphatrader\ApiBundle\Model\Error
     */
    public function getUserProfile($username)
    {
        $data = $this->get('userprofiles/' . $username);
        return $this->parseResponse($data, 'Alphatrader\ApiBundle\Model\UserProfile');
    }

    /**
     * @param $username
     * @param $email
     * @param $password
     *
     * @return \Alphatrader\ApiBundle\Model\UserAccount|\Alphatrader\ApiBundle\Model\Error
     */
    public function registerUser($username, $email, $password)
    {
        $data = $this->post(
            $this->config['apiurl'] . '/user/register',
            ['username' => $username, 'emailAddress' => $email, 'password' => $password]
        );
        return $this->parseResponse($data, 'Alphatrader\ApiBundle\Model\UserAccount');
    }

    /**
     * @param $username
     * @param $password
     *
     * @return mixed
     */
    public function getUserJwt($username, $password)
    {
        $request = $this->post(
            $this->config['apiurl'] . '/user/token/',
            ['username' => $username, 'password' => $password]
        );
        $data = $request->getBody()->getContents();
        /**
         * @var \Alphatrader\ApiBundle\Model\MessagePrototype $oResult
         */
        $oResult = $this->getSerializer()->deserialize(
            $data,
            'Alphatrader\ApiBundle\Model\MessagePrototype',
            'json'
        );

        return $oResult->getMessage();
    }

    /**
     * @return \Alphatrader\ApiBundle\Model\Error|mixed
     */
    public function deleteUser()
    {
        $data = $this->delete("v2/my/user");
        return $this->parseResponse($data, 'Alphatrader\ApiBundle\Model\MessagePrototype');
    }

    /**
     * @param $emailAddress
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\MessagePrototype
     */
    public function resetPassword($emailAddress)
    {
        $data = $this->put($this->config['apiurl'] ."/user/passwordreset", ['emailaddress' => $emailAddress]);
        return $this->parseResponse($data, 'Alphatrader\ApiBundle\Model\MessagePrototype');
    }

    /**
     * @param $password
     * @param $username
     * @param $email
     * @return \Alphatrader\ApiBundle\Model\Error|\Alphatrader\ApiBundle\Model\MessagePrototype
     */
    public function changeUserProperties($password, $username, $email)
    {
        $data = $this->patch("v2/my/user", [
            'password' => $password,
            'username' => $username,
            'emailaddress' => $email
        ]);
        return $this->parseResponse($data, 'Alphatrader\ApiBundle\Model\MessagePrototype');
    }
}
