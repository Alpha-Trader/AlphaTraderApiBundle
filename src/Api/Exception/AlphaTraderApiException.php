<?php

namespace Alphatrader\ApiBundle\Api\Exception;

use Alphatrader\ApiBundle\Model\Error;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

/**
 * Class AlphaTraderApiException
 * @package Alphatrader\ApiBundle\Api\Exception
 * @author Tr0nYx
 */
class AlphaTraderApiException extends \RuntimeException implements HttpExceptionInterface
{
    /**
     * @var string
     */
    private $statusCode;

    /**
     * @var array
     */
    private $headers;

    /**
     * @var Error
     */
    private $error;

    /**
     * AlphaTraderApiException constructor.
     *
     * @param string          $statusCode
     * @param Error           $error
     * @param \Exception|null $previous
     * @param array           $headers
     * @param int             $code
     */
    public function __construct(
        $statusCode,
        Error $error,
        \Exception $previous = null,
        array $headers = array(),
        $code = 0
    ) {
        $this->statusCode = $statusCode;
        $this->headers = $headers;
        $this->error = $error;

        parent::__construct($error->getMessage(), $code, $previous);
    }

    /**
     * @return string
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @return mixed
     */
    public function getSubstituitions()
    {
        return $this->error->getMessagePrototype()->getSubstitutions();
    }

    /**
     * @return mixed
     */
    public function getMessageString()
    {
        return $this->error->getMessagePrototype()->getMessage();
    }

    /**
     * @return mixed
     */
    public function getFilledString()
    {
        return $this->error->getMessagePrototype()->getFilledString();
    }

    /**
     * @return Error
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * Set response headers.
     *
     * @param array $headers Response headers
     */
    public function setHeaders(array $headers)
    {
        $this->headers = $headers;
    }
}
