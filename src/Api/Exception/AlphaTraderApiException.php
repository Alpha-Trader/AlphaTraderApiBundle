<?php

namespace Alphatrader\ApiBundle\Api\Exception;

use Alphatrader\ApiBundle\Model\Error;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

class AlphaTraderApiException extends \RuntimeException implements HttpExceptionInterface
{
    private $statusCode;

    private $headers;

    /**
     * @var Error
     */
    private $error;

    public function __construct(
        $statusCode,
        $error = null,
        \Exception $previous = null,
        array $headers = array(),
        $code = 0
    ) {
        $this->statusCode = $statusCode;
        $this->headers = $headers;
        $this->error = $error;

        parent::__construct($error->getMessage(), $code, $previous);
    }

    public function getStatusCode()
    {
        return $this->statusCode;
    }

    public function getHeaders()
    {
        return $this->headers;
    }

    public function getSubstituitions()
    {
        return $this->error->getMessagePrototype()->getSubstitutions();
    }

    public function getMessageString()
    {
        return $this->error->getMessagePrototype()->getMessage();
    }

    public function getFilledString()
    {
        return $this->error->getMessagePrototype()->getFilledString();
    }

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
