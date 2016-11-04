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
     *
     * @return \Alphatrader\ApiBundle\Model\Complaint|\Alphatrader\ApiBundle\Model\Error
     */
    public function getComplaint($complaintId)
    {
        return $this->getComplaintController()->getComplaintById($complaintId);
    }

    /**
     * @param string $subjectMatterId
     * @param string $subjectMatterType
     * @param string $text
     *
     * @return \Alphatrader\ApiBundle\Model\Complaint|\Alphatrader\ApiBundle\Model\Error
     */
    public function createComplaint($subjectMatterId, $subjectMatterType, $text)
    {
        return $this->getComplaintController()->createComplaint($subjectMatterId, $subjectMatterType, $text);
    }

    /**
     * @return ComplaintController
     */
    public function getComplaintController()
    {
        return new ComplaintController($this->config, $this->jwt);
    }
}
