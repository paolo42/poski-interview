<?php


class DatabaseConnection
{

    public function __construct(array $parameters)
    {
    }

    /**
     * @param string $batchSizeLimit
     * @return array
     */
    public function getBatchOfProductsForFirstExport(string $batchSizeLimit) : array
    {
        return $this->execute(
            'SELECT * FROM products WHERE product_id_external IS NULL LIMIT :batch_size_limit',
            ['batch_size_limit' => $batchSizeLimit]
        );
    }

    /**
     * @param int $productId
     * @param int $productIdExternal
     */
    public function markProductAsExported(int $productId, int $productIdExternal)
    {
        $this->execute(
            'UPDATE products SET product_id_external = :product_id_external WHERE id = :product_id' ,
            [
                'product_id' => $productId,
                'product_id_external' => $productIdExternal,
            ]
        );
    }

    /**
     * @param $sqlString
     * @param array $sqlValues
     * @return array
     */
    public function execute($sqlString, array $sqlValues): array
    {
        // ... nevermind
        return [];
    }
}