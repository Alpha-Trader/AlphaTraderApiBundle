<?php

namespace Alphatrader\ApiBundle\Model;

use JMS\Serializer\Annotation;

/**
 * Trait OrderCheck
 *
 * @package Alphatrader\ApiBundle\Model
 * @Annotation\ExclusionPolicy("none")
 */
trait PageTrait
{
    /**
     * @var boolean
     * @Annotation\Type("boolean")
     * @Annotation\SerializedName("first")
     */
    private $first;

    /**
     * @var boolean
     * @Annotation\Type("boolean")
     * @Annotation\SerializedName("last")
     */
    private $last;

    /**
     * @var integer
     * @Annotation\Type("integer")
     * @Annotation\SerializedName("number")
     */
    private $number;

    /**
     * @var integer
     * @Annotation\Type("integer")
     * @Annotation\SerializedName("numberOfElements")
     */
    private $numberOfElements;

    /**
     * @var integer
     * @Annotation\Type("integer")
     * @Annotation\SerializedName("size")
     */
    private $size;

    /**
     * @var array
     * @Annotation\Type("array")
     * @Annotation\SerializedName("sort")
     */
    private $sort;

    /**
     * @var integer
     * @Annotation\Type("integer")
     * @Annotation\SerializedName("totaleElements")
     */
    private $totalElements;

    /**
     * @var string
     * @Annotation\Type("integer")
     * @Annotation\SerializedName("totalPages")
     */
    private $totalPages;

    /**
     * @return bool
     */
    public function isFirst()
    {
        return $this->first;
    }

    /**
     * @param bool $first
     */
    public function setFirst($first)
    {
        $this->first = $first;
    }

    /**
     * @return bool
     */
    public function isLast()
    {
        return $this->last;
    }

    /**
     * @param bool $last
     */
    public function setLast($last)
    {
        $this->last = $last;
    }

    /**
     * @return int
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param int $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }

    /**
     * @return int
     */
    public function getNumberOfElements()
    {
        return $this->numberOfElements;
    }

    /**
     * @param int $numberOfElements
     */
    public function setNumberOfElements($numberOfElements)
    {
        $this->numberOfElements = $numberOfElements;
    }

    /**
     * @return int
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @param int $size
     */
    public function setSize($size)
    {
        $this->size = $size;
    }

    /**
     * @return string
     */
    public function getSort()
    {
        return $this->sort;
    }

    /**
     * @param string $sort
     */
    public function setSort($sort)
    {
        $this->sort = $sort;
    }

    /**
     * @return int
     */
    public function getTotalElements()
    {
        return $this->totalElements;
    }

    /**
     * @param int $totalElements
     */
    public function setTotalElements($totalElements)
    {
        $this->totalElements = $totalElements;
    }

    /**
     * @return string
     */
    public function getTotalPages()
    {
        return $this->totalPages;
    }

    /**
     * @param string $totalPages
     */
    public function setTotalPages($totalPages)
    {
        $this->totalPages = $totalPages;
    }
}
