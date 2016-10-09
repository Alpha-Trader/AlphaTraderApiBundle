<?php
/**
 * User: ljbergmann
 * Date: 09.10.16 13:30
 */

namespace Tests\Model;

use Alphatrader\ApiBundle\Model\Complaint;

/**
 * Class ComplaintTest
 * @package Tests\Model
 */

class ComplaintTest extends \PHPUnit_Framework_TestCase
{
    use RandomTrait;

    public function testId()
    {
        $complaint = new Complaint();
        $this->assertNull($complaint->getId());

        $id = uniqid();
        $complaint->setId($id);

        $this->assertEquals($id, $complaint->getId());
    }

    public function testCloseDate()
    {
        $complaint = new Complaint();
        $this->assertNull($complaint->getCloseDate());

        $date = new \DateTime('now');
        $date = $date->getTimestamp();
        $complaint->setCloseDate($date);

        $this->assertTrue(is_int($complaint->getCloseDate()));
        $this->assertEquals($date, $complaint->getCloseDate());
    }

    public function testOpenDate()
    {
        $complaint = new Complaint();
        $this->assertNull($complaint->getOpenDate());

        $date = new \DateTime('now');
        $date = $date->getTimestamp();
        $complaint->setOpenDate($date);

        $this->assertTrue(is_int($complaint->getOpenDate()));
        $this->assertEquals($date, $complaint->getOpenDate());
    }

    public function testComment()
    {
        $complaint = new Complaint();
        $this->assertNull($complaint->getComment());

        $comment = $this->getRandomString(600);
        $complaint->setComment($comment);

        $this->assertTrue(is_string($complaint->getComment()));
        $this->assertEquals($comment, $complaint->getComment());
    }

    public function testReviewDate()
    {
        $complaint = new Complaint();
        $this->assertNull($complaint->getReviewDate());

        $date = new \DateTime('now');
        $date = $date->getTimestamp();
        $complaint->setReviewDate($date);

        $this->assertTrue(is_int($complaint->getReviewDate()));
        $this->assertEquals($date, $complaint->getReviewDate());
    }

    public function testStatus()
    {
        $complaint = new Complaint();
        $this->assertNull($complaint->getStatus());

        $status = $this->getRandomString(20);
        $complaint->setStatus($status);

        $this->assertTrue(is_string($complaint->getStatus()));
        $this->assertEquals($status, $complaint->getStatus());
    }

    public function testSubjectMatter()
    {
        $complaint = new Complaint();
        $this->assertNull($complaint->getSubjectMatter());

        $status = $this->getRandomString(20);
        $complaint->setSubjectMatter($status);

        $this->assertTrue(is_string($complaint->getSubjectMatter()));
        $this->assertEquals($status, $complaint->getSubjectMatter());
    }

    public function testSubjectMatterType()
    {
        $complaint = new Complaint();
        $this->assertNull($complaint->getSubjectMatterType());

        $status = $this->getRandomString(20);
        $complaint->setSubjectMatterType($status);

        $this->assertTrue(is_string($complaint->getSubjectMatterType()));
        $this->assertEquals($status, $complaint->getSubjectMatterType());
    }
}
