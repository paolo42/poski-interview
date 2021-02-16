<?php


class RestClient implements RestClientInterface
{
    const POST = 'post';
    const GET = 'get';
    const PUT = 'put';
    const DELETE = 'delete';

    const STATUS_SUCCESS = 0;

    public function __construct(array $parameters)
    {
        $this->configure($parameters);
    }

    /**
     * @param array $parameters
     *
     * The idea behind this method is: Configuration should happen in constructor, but extracted to a separate method
     * We don't have the actual config here, so I at least created a dummy method for that.
     */
    public function configure(array $parameters)
    {
    }

    public function get(ProductRestData $productRestData): RestCallResult
    {
        return $this->executeRestCall($productRestData, self::GET);
    }

    public function post(ProductRestData $productRestData): RestCallResult
    {
        return $this->executeRestCall($productRestData, self::POST);
    }

    public function put(ProductRestData $productRestData) : RestCallResult
    {
        return $this->executeRestCall($productRestData, self::PUT);
    }

    public function delete(ProductRestData $productRestData) : RestCallResult
    {
        return $this->executeRestCall($productRestData, self::DELETE);
    }

    private function executeRestCall(ProductRestData $productRestData, string $methodName): RestCallResult
    {

        $statusCode = self::STATUS_SUCCESS;

        return new RestCallResult($statusCode, $productRestData);
    }

}