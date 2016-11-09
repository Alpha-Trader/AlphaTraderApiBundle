<?php

namespace Alphatrader\ApiBundle\Model;

use JMS\Serializer\Annotation;

/**
 * Class CashTransferLogEntry
 *
 * @package                            Alphatrader\ApiBundle\Model
 * @Annotation\ExclusionPolicy("none")
 */
class CashTransferLogEntry
{
    use DateTrait;
    
    /**
     * @var int
     * @Annotation\Type("string")
     * @Annotation\SerializedName("id")
     */
    private $id;

    /**
     * @var float
     * @Annotation\Type("float")
     * @Annotation\SerializedName("amount")
     */
    private $amount;

    /**
     * @var string
     * @Annotation\Type("Alphatrader\ApiBundle\Model\MessagePrototype")
     * @Annotation\SerializedName("message")
     */
    private $message;

    /**
     * @var string
     * @Annotation\Type("string")
     * @Annotation\SerializedName("receiverBankAccount")
     */
    private $receiverBankAcc;

    /**
     * @var string
     * @Annotation\Type("string")
     * @Annotation\SerializedName("senderBankAccount")
     */
    private $senderBankAcc;

    /**
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return MessagePrototype
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param MessagePrototype $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * @return string
     */
    public function getReceiverBankAccount()
    {
        return $this->receiverBankAcc;
    }

    /**
     * @param string $receiverBankAcc
     */
    public function setReceiverBankAccount($receiverBankAcc)
    {
        $this->receiverBankAcc = $receiverBankAcc;
    }

    /**
     * @return string
     */
    public function getSenderBankAccount()
    {
        return $this->senderBankAcc;
    }

    /**
     * @param string $senderBankAcc
     */
    public function setSenderBankAccount($senderBankAcc)
    {
        $this->senderBankAcc = $senderBankAcc;
    }
}
