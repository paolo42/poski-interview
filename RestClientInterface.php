<?php


interface RestClientInterface
{
    public function configure(array $parameters);

    public function get(ProductRestData $productRestData) : RestCallResult;

    public function post(ProductRestData $productRestData) : RestCallResult;

    public function put(ProductRestData $productRestData) : RestCallResult;

    public function delete(ProductRestData $productRestData) : RestCallResult;
}