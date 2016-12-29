<?php

namespace Alphatrader\ApiBundle\Model;

use JMS\Serializer\Annotation;

/**
 * Class Posts
 *
 * @package Alphatrader\ApiBundle\Model
 * @Annotation\ExclusionPolicy("none")
 * @author ljbergmann <l.bergmann@sky-lab.de>
 * @SuppressWarnings(PHPMD)
 */
class Posts
{
    /**
     * @var
     * @Annotation\Type("Alphatrader\ApiBundle\Model\Alliance")
     * @Annotation\SerializedName("alliance")
     */
    private $alliance;

    /**
     * @var UserName
     * @Annotation\Type("Alphatrader\ApiBundle\Model\UserName")
     * @Annotation\SerializedName("author")
     */
    private $author;

    /**
     * @var boolean
     * @Annotation\Type("boolean")
     * @Annotation\SerializedName("comment")
     */
    private $comment;

    /**
     * @var CompactCompany
     * @Annotation\Type("Alphatrader\ApiBundle\Model\CompactCompany")
     * @Annotation\SerializedName("company")
     */
    private $company;

    /**
     * @var string
     * @Annotation\Type("string")
     * @Annotation\SerializedName("content")
     */
    private $content;

    /**
     * @var \DateTime
     * @Annotation\Type("integer")
     * @Annotation\SerializedName("dateCreated")
     */
    private $dateCreated;

    /**
     * @var \DateTime
     * @Annotation\Type("integer")
     * @Annotation\SerializedName("dateDeleted")
     */
    private $dateDeleted;

    /**
     * @var \DateTime
     * @Annotation\Type("integer")
     * @Annotation\SerializedName("dateEdited")
     */
    private $dateEdited;

    /**
     * @var HashTag[]
     * @Annotation\Type("ArrayCollection<Alphatrader\ApiBundle\Model\HashTag>")
     * @Annotation\SerializedName("hashTags")
     */
    private $hashTags;

    /**
     * @var string
     * @Annotation\Type("string")
     * @Annotation\SerializedName("id")
     */
    private $id;

    /**
     * @var integer
     * @Annotation\Type("integer")
     * @Annotation\SerializedName("numberOfLikes")
     */
    private $numberOfLikes;

    /**
     * @var integer
     * @Annotation\Type("integer")
     * @Annotation\SerializedName("numberOfDislikes")
     */
    private $numberOfDislikes;

    /**
     * @var string
     * @Annotation\Type("string")
     * @Annotation\SerializedName("locale")
     */
    private $locale;

    /**
     * @var MessageBoard
     * @Annotation\Type("Alphatrader\ApiBundle\Model\MessageBoard")
     * @Annotation\SerializedName("messageBoard")
     */
    private $messageBoard;

    /**
     * @var boolean
     * @Annotation\Type("boolean")
     * @Annotation\SerializedName("newsPostOrNewsComment")
     */
    private $newsPostOrNewsComment;

    /**
     * @var string
     * @Annotation\Type("string")
     * @Annotation\SerializedName("parent")
     */
    private $parent;

    /**
     * @var string
     * @Annotation\Type("string")
     * @Annotation\SerializedName("root")
     */
    private $root;

    /**
     * @var string
     * @Annotation\Type("string")
     * @Annotation\SerializedName("title")
     */
    private $title;

    /**
     * @return mixed
     */
    public function getAlliance()
    {
        return $this->alliance;
    }

    /**
     * @param mixed $alliance
     */
    public function setAlliance($alliance)
    {
        $this->alliance = $alliance;
    }

    /**
     * @return UserName
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param UserName $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @return boolean
     */
    public function isComment()
    {
        return $this->comment;
    }

    /**
     * @param boolean $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    /**
     * @return CompactCompany
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param CompactCompany $company
     */
    public function setCompany($company)
    {
        $this->company = $company;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return \DateTime
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    /**
     * @param \DateTime $dateCreated
     */
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;
    }

    /**
     * @return \DateTime
     */
    public function getDateDeleted()
    {
        return $this->dateDeleted;
    }

    /**
     * @param \DateTime $dateDeleted
     */
    public function setDateDeleted($dateDeleted)
    {
        $this->dateDeleted = $dateDeleted;
    }

    /**
     * @return \DateTime
     */
    public function getDateEdited()
    {
        return $this->dateEdited;
    }

    /**
     * @param \DateTime $dateEdited
     */
    public function setDateEdited($dateEdited)
    {
        $this->dateEdited = $dateEdited;
    }

    /**
     * @return HashTag[]
     */
    public function getHashTags()
    {
        return $this->hashTags;
    }

    /**
     * @param HashTag[] $hashTags
     */
    public function setHashTags($hashTags)
    {
        $this->hashTags = $hashTags;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return PostLike[]
     */
    public function getLikes()
    {
        return $this->likes;
    }

    /**
     * @param PostLike[] $likes
     */
    public function setLikes($likes)
    {
        $this->likes = $likes;
    }

    /**
     * @return string
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * @param string $locale
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;
    }

    /**
     * @return MessageBoard
     */
    public function getMessageBoard()
    {
        return $this->messageBoard;
    }

    /**
     * @param MessageBoard $messageBoard
     */
    public function setMessageBoard($messageBoard)
    {
        $this->messageBoard = $messageBoard;
    }

    /**
     * @return boolean
     */
    public function isNewsPostOrNewsComment()
    {
        return $this->newsPostOrNewsComment;
    }

    /**
     * @param boolean $newsPostOrNewsComment
     */
    public function setNewsPostOrNewsComment($newsPostOrNewsComment)
    {
        $this->newsPostOrNewsComment = $newsPostOrNewsComment;
    }

    /**
     * @return string
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @param string $parent
     */
    public function setParent($parent)
    {
        $this->parent = $parent;
    }

    /**
     * @return string
     */
    public function getRoot()
    {
        return $this->root;
    }

    /**
     * @param string $root
     */
    public function setRoot($root)
    {
        $this->root = $root;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return int
     */
    public function getNumberOfLikes()
    {
        return $this->numberOfLikes;
    }

    /**
     * @param int $numberOfLikes
     */
    public function setNumberOfLikes($numberOfLikes)
    {
        $this->numberOfLikes = $numberOfLikes;
    }

    /**
     * @return int
     */
    public function getNumberOfDislikes()
    {
        return $this->numberOfDislikes;
    }

    /**
     * @param int $numberOfDislikes
     */
    public function setNumberOfDislikes($numberOfDislikes)
    {
        $this->numberOfDislikes = $numberOfDislikes;
    }

    /**
     * @SuppressWarnings("unused")
     * @Annotation\PostDeserialize
     */
    private function afterDeserialization()
    {
        if ($this->dateCreated !== null) {
            $date = substr($this->dateCreated, 0, 10) . '.' . substr($this->dateCreated, 10);
            $micro = sprintf("%06d", ($date - floor($date)) * 1000000);
            $date = new \DateTime(date('Y-m-d H:i:s.' . $micro, $date));
            $this->dateCreated = $date;
        }
        if ($this->dateEdited !== null) {
            $date = substr($this->dateEdited, 0, 10) . '.' . substr($this->dateEdited, 10);
            $micro = sprintf("%06d", ($date - floor($date)) * 1000000);
            $date = new \DateTime(date('Y-m-d H:i:s.' . $micro, $date));
            $this->dateEdited = $date;
        }
        if ($this->dateDeleted !== null) {
            $enddate = substr($this->dateDeleted, 0, 10) . '.' . substr($this->dateDeleted, 10);
            $micro = sprintf("%06d", ($enddate - floor($enddate)) * 1000000);
            $date = new \DateTime(date('Y-m-d H:i:s.' . $micro, $enddate));
            $this->dateDeleted = $date;
        }
    }

    /**
     * @SuppressWarnings("unused")
     * @Annotation\PreSerialize
     */
    private function preSerialization()
    {
        if ($this->dateCreated instanceof \DateTime) {
            $this->dateCreated = $this->dateCreated->getTimestamp();
        }
        if ($this->dateEdited instanceof \DateTime) {
            $this->dateEdited = $this->dateEdited->getTimestamp();
        }
        if ($this->dateDeleted instanceof \DateTime) {
            $this->dateDeleted = $this->dateDeleted->getTimestamp();
        }
    }
}
