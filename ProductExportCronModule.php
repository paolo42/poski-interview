<?php


class ProductExportCronModule
{

    public const BATCH_SIZE = 1000;

    /**
     * @var DatabaseConnection 
     */
    private DatabaseConnection $databaseConnection;

    /**
     * @var RestClient 
     */
    private RestClient $restClient;

    /**
     * @var ProductDataMapper 
     */
    private ProductDataMapper $productDataMapper;

    public function __construct(
        DatabaseConnection $databaseConnection,
        RestClient $restClient
    ) {
        $this->databaseConnection = $databaseConnection;
        $this->restClient = $restClient;
    }

    public function run() {
        $this->exportBatchOfNewProducts();
    }

    private function exportBatchOfNewProducts()
    {
        $currentBatch = $this->databaseConnection->getBatchOfProductsForFirstExport(self::BATCH_SIZE);

        foreach ($currentBatch as $product) {
            $this->exportNewProduct($product);
        }
    }

    /**
     * @param array $product
     */
    private function exportNewProduct(array $product)
    {
        $productRestData = $this->productDataMapper->mapDatabaseRowToRestObject($product);
        $restCallResult = $this->restClient->post($productRestData);

        if ($restCallResult->statusCode === RestClient::STATUS_SUCCESS) {
            $productId = $restCallResult->productRestData->productId;
            $productIdExternal = $restCallResult->productRestData->productIdExternal;

            $this->databaseConnection->markProductAsExported($productId, $productIdExternal);
        }
    }
}