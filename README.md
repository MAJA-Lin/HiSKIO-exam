## Start

Requirement:

> "php": ">=7.2"

Install dependency by running:

> $ composer install

## Adding platform

The default platforms are Yahoo, Ruten, PcHome and Shopee.

For publishing product, you can simply call [ProductService](./app/Services/ProductService.php)

```php
$product = new \App\Models\Product;
// do something and setup product information

$productService = new \App\Services\ProductService;
// This will publish product to default platforms
$productService->publishNewProduct($product);
```

For specifying the platform to publish, try:

```php
$product = new \App\Models\Product;
// Attach platforms
$product->setupPlatforms([
    \App\Factories\PchomeFactory::class,
    \App\Factories\ShopeeFactory::class
]);
```

For adding new platform, you need to add new platform class into **./app/Models/** which extends [App\Models\Platforms\Platform](./app/Models/Platforms/Platform.php).

Then add new platform factory into **./app/Factories/** and implement [App\Factories\PlatformFactoryInterface](./app/Factories/PlatformFactoryInterface.php)

Now you can just run it with:

```php
$product->setupPlatforms([\App\Factories\NewPlatformFactory::class]);
```

## How to run test

Make sure you have both **composer** and **docker** installed,
then run

> $ composer test:build

for building a php 7.3 image (with xdebug enable),
then run

* For Windows:

> $ composer test:run-win

* For Linux (not tested yet):

> $ composer test:run-linux

to test and generate report files.

The coverage report files will be at **./tests/report**.
