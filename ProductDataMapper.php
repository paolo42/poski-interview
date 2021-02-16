<?php

class ProductDataMapper
{
    /**
     * @param array $product
     * @return ProductRestData
     */
    public function mapDatabaseRowToRestObject(array $product): ProductRestData
    {
        $productRestData = new ProductRestData();
        $productRestData->productId = $product['id'];
        $productRestData->productIdExternal = null;

        // Anything needed in transfer, for example expected keys in request body not matching DB columns

        return $productRestData;
    }

}