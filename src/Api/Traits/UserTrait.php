<?php

namespace Alphatrader\ApiBundle\Api\Traits;

use Alphatrader\ApiBundle\Api\Methods\UserAccountController;

/**
 * Class UserTrait
 * @package Alphatrader\ApiBundle\Api\Traits
 * @author Tr0nYx
 */
trait UserTrait
{
    /**
     * @return \Alphatrader\ApiBundle\Model\UserAccount
     */
    public function getCurrentUser()
    {
        return $this->getUserAccountController()->getCurrentUser();
    }

    /**
     * @param string $userId
     * @return \Alphatrader\ApiBundle\Model\UserAccount
     */
    public function getUserById($userId)
    {
        return $this->getUserAccountController()->getUserById($userId);
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
        return $this->getUserAccountController()->getUserJwt($username, $password);
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
     * @return UserAccountController
     */
    public function getUserAccountController()
    {
        return new UserAccountController($this->config, $this->jwt);
    }
}
