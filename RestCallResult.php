<?php


class RestCallResult
{

    public ProductRestData $productRestData;

    public function __construct(int $statusCode, ProductRestData $productRestData)
    {
        $this->statusCode = $statusCode;
        $this->productRestData = $productRestData;
    }

    public int $statusCode = RestClient::STATUS_SUCCESS;

}