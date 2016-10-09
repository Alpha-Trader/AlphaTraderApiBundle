<?php
/**
 * User: ljbergmann
 * Date: 09.10.16 13:06
 */

namespace Alphatrader\ApiBundle\Model;

use JMS\Serializer\Annotation;

/**
 * Class Complaint
 * @package Alphatrader\ApiBundle\Model
 * @Annotation\ExclusionPolicy("none")
 */
class Complaint
{
    /**
     * @Annotation\Type("string")
     * @Annotation\SerializedName("id")
     */
    private $id;

    /**
     * @Annotation\Type("int")
     * @Annotation\SerializedName("closeDate")
     */
    private $closeDate;
    /**
     * @Annotation\Type("int")
     * @Annotation\SerializedName("openDate")
     */
    private $openDate;
    /**
     * @Annotation\Type("string")
     * @Annotation\SerializedName("comment")
     */
    private $comment;
    /**
     * @Annotation\Type("int")
     * @Annotation\SerializedName("reviewDate")
     */
    private $reviewDate;
    /**
     * @Annotation\Type("string")
     * @Annotation\SerializedName("status")
     */
    private $status;
    /**
     * @Annotation\Type("string")
     * @Annotation\SerializedName("subjectMatter")
     */
    private $subjectMatter;
    /**
     * @Annotation\Type("string")
     * @Annotation\SerializedName("subjectMatterType")
     */
    private $subjectMatterType;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getCloseDate()
    {
        return $this->closeDate;
    }

    /**
     * @param mixed $closeDate
     */
    public function setCloseDate($closeDate)
    {
        $this->closeDate = $closeDate;
    }

    /**
     * @return mixed
     */
    public function getOpenDate()
    {
        return $this->openDate;
    }

    /**
     * @param mixed $openDate
     */
    public function setOpenDate($openDate)
    {
        $this->openDate = $openDate;
    }

    /**
     * @return mixed
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param mixed $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    /**
     * @return mixed
     */
    public function getReviewDate()
    {
        return $this->reviewDate;
    }

    /**
     * @param mixed $reviewDate
     */
    public function setReviewDate($reviewDate)
    {
        $this->reviewDate = $reviewDate;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getSubjectMatter()
    {
        return $this->subjectMatter;
    }

    /**
     * @param mixed $subjectMatter
     */
    public function setSubjectMatter($subjectMatter)
    {
        $this->subjectMatter = $subjectMatter;
    }

    /**
     * @return mixed
     */
    public function getSubjectMatterType()
    {
        return $this->subjectMatterType;
    }

    /**
     * @param mixed $subjectMatterType
     */
    public function setSubjectMatterType($subjectMatterType)
    {
        $this->subjectMatterType = $subjectMatterType;
    }
}
