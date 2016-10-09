<?php

namespace Alphatrader\ApiBundle\Api\Traits;

use Alphatrader\ApiBundle\Api\Methods\ComplaintController;

/**
 * Class ComplaintTrait
 * @package Alphatrader\ApiBundle\Api\Traits
 * @author ljbergmann
 */
trait ComplaintTrait
{

    /**
     * @param string $complaintId
     * @return \Alphatrader\ApiBundle\Model\Complaint|\Alphatrader\ApiBundle\Model\Error
     */
    public function getComplaint(string $complaintId)
    {
        return $this->getComplaintController()->getComplaintById($complaintId);
    }

    /**
     * @param string $subjectMatterId
     * @param string $subjectMatterTyoe
     * @param string $text
     * @return \Alphatrader\ApiBundle\Model\Complaint|\Alphatrader\ApiBundle\Model\Error
     */
    public function createComplaint(string $subjectMatterId, string $subjectMatterTyoe, string $text)
    {
        return $this->getComplaintController()->createComplaint($subjectMatterId, $subjectMatterTyoe, $text);
    }

    /**
     * @return ComplaintController
     */
    public function getComplaintController()
    {
        return new ComplaintController($this->config, $this->jwt);
    }
}
