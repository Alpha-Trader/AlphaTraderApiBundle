<?php
/*
 * This file is part of the AlphaTraderApiBundle package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Alphatrader\ApiBundle\Api\Methods;

use Alphatrader\ApiBundle\Api\ApiClient;
use Alphatrader\ApiBundle\Model\Complaint;
use Alphatrader\ApiBundle\Model\Error;

/**
 * Class ComplainController
 * @package AlphaTrader\API\Controller
 * @author ljbergmann <l.bergmann@sky-lab.de>
 */

class ComplaintController extends ApiClient
{
    /**
     * @param $companyId
     * @return Alphatrader\ApiBundle\Model|Complaint|Error
     */
    public function getComplaintById($companyId)
    {
        $data = $this->get("complaints/". $companyId);
        return $this->parseResponse($data, "Alphatrader\ApiBundle\Model\Complaint");
    }
    /**
     * @param string $subjectMatterId
     * @param string $subjectMatterType
     * @param string $text
     *
     * @return Alphatrader\ApiBundle\Model|Complaint|Error
     */
    public function createComplaint($subjectMatterId, $subjectMatterType, $text)
    {
        $data = $this->post("complaints/", [
                'subjectMatterId' => $subjectMatterId,
                'subjectMatterType' => $subjectMatterType,
                'text' => $text
            ]);

        return $this->parseResponse($data, "Alphatrader\ApiBundle\Model\Complaint");
    }
}
