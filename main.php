<?php

$restClientConfigParameters = [];
$databaseConnectionConfigParameters = [];

$databaseConnection = new DatabaseConnection($databaseConnectionConfigParameters);
$restClient = new RestClient($restClientConfigParameters);

$productExportCronModule = new ProductExportCronModule($databaseConnection, $restClient);
$productExportCronModule->run();