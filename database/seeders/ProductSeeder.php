<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductVariant;
use App\Models\ProductVariantImage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            // Football Equipment
            [
                'category_id' => 1,
                'name' => 'Professional Football',
                'description' => 'High-quality professional football for matches and training',
                'price' => 29.99,
                'discount' => 0,
                'brand' => 'Nike',
                'slug' => 'professional-football',
                'variants' => [
                    [
                        'size' => 'Size 5',
                        'color' => 'White',
                        'price' => 29.99,
                        'images' => ['product1.jpg', 'product2.jpg']
                    ],
                    [
                        'size' => 'Size 5',
                        'color' => 'Black',
                        'price' => 29.99,
                        'images' => ['product3.jpg', 'product4.jpg']
                    ]
                ],
                'images' => ['product1.jpg', 'product2.jpg']
            ],
            [
                'category_id' => 1,
                'name' => 'Football Cleats',
                'description' => 'Professional football cleats with superior grip',
                'price' => 89.99,
                'discount' => 10,
                'brand' => 'Adidas',
                'slug' => 'football-cleats',
                'variants' => [
                    [
                        'size' => 'US 8',
                        'color' => 'Black/White',
                        'price' => 89.99,
                        'images' => ['product1.jpg', 'product2.jpg']
                    ],
                    [
                        'size' => 'US 9',
                        'color' => 'Blue/White',
                        'price' => 89.99,
                        'images' => ['product3.jpg', 'product4.jpg']
                    ]
                ],
                'images' => ['product1.jpg', 'product2.jpg']
            ],

            // Basketball Gear
            [
                'category_id' => 2,
                'name' => 'Professional Basketball',
                'description' => 'Official size and weight basketball for professional games',
                'price' => 34.99,
                'discount' => 5,
                'brand' => 'Spalding',
                'slug' => 'professional-basketball',
                'variants' => [
                    [
                        'size' => 'Size 7',
                        'color' => 'Orange',
                        'price' => 34.99,
                        'images' => ['product1.jpg', 'product2.jpg']
                    ]
                ],
                'images' => ['product1.jpg', 'product2.jpg']
            ],
            [
                'category_id' => 2,
                'name' => 'Basketball Shoes',
                'description' => 'High-performance basketball shoes with ankle support',
                'price' => 129.99,
                'discount' => 15,
                'brand' => 'Nike',
                'slug' => 'basketball-shoes',
                'variants' => [
                    [
                        'size' => 'US 9',
                        'color' => 'Black/Red',
                        'price' => 129.99,
                        'images' => ['product1.jpg', 'product2.jpg']
                    ],
                    [
                        'size' => 'US 10',
                        'color' => 'White/Blue',
                        'price' => 129.99,
                        'images' => ['product3.jpg', 'product4.jpg']
                    ]
                ],
                'images' => ['product1.jpg', 'product2.jpg']
            ],

            // Running Gear
            [
                'category_id' => 3,
                'name' => 'Running Shoes',
                'description' => 'Lightweight running shoes with superior cushioning',
                'price' => 89.99,
                'discount' => 10,
                'brand' => 'Adidas',
                'slug' => 'running-shoes',
                'variants' => [
                    [
                        'size' => 'US 7',
                        'color' => 'Blue',
                        'price' => 89.99,
                        'images' => ['product1.jpg', 'product2.jpg']
                    ],
                    [
                        'size' => 'US 8',
                        'color' => 'Red',
                        'price' => 89.99,
                        'images' => ['product3.jpg', 'product4.jpg']
                    ]
                ],
                'images' => ['product1.jpg', 'product2.jpg']
            ],

            // Tennis Equipment
            [
                'category_id' => 4,
                'name' => 'Tennis Racket',
                'description' => 'Professional tennis racket with perfect balance',
                'price' => 159.99,
                'discount' => 20,
                'brand' => 'Wilson',
                'slug' => 'tennis-racket',
                'variants' => [
                    [
                        'size' => 'Standard',
                        'color' => 'Black/Red',
                        'price' => 159.99,
                        'images' => ['product1.jpg', 'product2.jpg']
                    ]
                ],
                'images' => ['product1.jpg', 'product2.jpg']
            ],

            // Fitness Equipment
            [
                'category_id' => 5,
                'name' => 'Yoga Mat',
                'description' => 'Premium non-slip yoga mat',
                'price' => 39.99,
                'discount' => 5,
                'brand' => 'Lululemon',
                'slug' => 'yoga-mat',
                'variants' => [
                    [
                        'size' => 'Standard',
                        'color' => 'Purple',
                        'price' => 39.99,
                        'images' => ['product1.jpg', 'product2.jpg']
                    ],
                    [
                        'size' => 'Standard',
                        'color' => 'Blue',
                        'price' => 39.99,
                        'images' => ['product3.jpg', 'product4.jpg']
                    ]
                ],
                'images' => ['product1.jpg', 'product2.jpg']
            ],

            // Swimming Gear
            [
                'category_id' => 6,
                'name' => 'Swimming Goggles',
                'description' => 'Professional swimming goggles with UV protection',
                'price' => 24.99,
                'discount' => 0,
                'brand' => 'Speedo',
                'slug' => 'swimming-goggles',
                'variants' => [
                    [
                        'size' => 'Standard',
                        'color' => 'Black',
                        'price' => 24.99,
                        'images' => ['product1.jpg', 'product2.jpg']
                    ],
                    [
                        'size' => 'Standard',
                        'color' => 'Blue',
                        'price' => 24.99,
                        'images' => ['product3.jpg', 'product4.jpg']
                    ]
                ],
                'images' => ['product1.jpg', 'product2.jpg']
            ],

            // Yoga & Pilates
            [
                'category_id' => 7,
                'name' => 'Yoga Block Set',
                'description' => 'Set of 4 premium yoga blocks',
                'price' => 29.99,
                'discount' => 0,
                'brand' => 'Manduka',
                'slug' => 'yoga-block-set',
                'variants' => [
                    [
                        'size' => 'Standard',
                        'color' => 'Purple',
                        'price' => 29.99,
                        'images' => ['product1.jpg', 'product2.jpg']
                    ]
                ],
                'images' => ['product1.jpg', 'product2.jpg']
            ],

            // Cycling Gear
            [
                'category_id' => 8,
                'name' => 'Cycling Helmet',
                'description' => 'Professional cycling helmet with ventilation',
                'price' => 49.99,
                'discount' => 10,
                'brand' => 'Giro',
                'slug' => 'cycling-helmet',
                'variants' => [
                    [
                        'size' => 'M',
                        'color' => 'Black',
                        'price' => 49.99,
                        'images' => ['product1.jpg', 'product2.jpg']
                    ],
                    [
                        'size' => 'L',
                        'color' => 'Red',
                        'price' => 49.99,
                        'images' => ['product3.jpg', 'product4.jpg']
                    ]
                ],
                'images' => ['product1.jpg', 'product2.jpg']
            ],

            // Boxing & MMA
            [
                'category_id' => 9,
                'name' => 'Boxing Gloves',
                'description' => 'Professional boxing gloves with wrist support',
                'price' => 59.99,
                'discount' => 5,
                'brand' => 'Everlast',
                'slug' => 'boxing-gloves',
                'variants' => [
                    [
                        'size' => '12oz',
                        'color' => 'Black',
                        'price' => 59.99,
                        'images' => ['product1.jpg', 'product2.jpg']
                    ],
                    [
                        'size' => '14oz',
                        'color' => 'Red',
                        'price' => 59.99,
                        'images' => ['product3.jpg', 'product4.jpg']
                    ]
                ],
                'images' => ['product1.jpg', 'product2.jpg']
            ],

            // Team Sports
            [
                'category_id' => 10,
                'name' => 'Volleyball',
                'description' => 'Professional volleyball for indoor and outdoor use',
                'price' => 34.99,
                'discount' => 0,
                'brand' => 'Mikasa',
                'slug' => 'volleyball',
                'variants' => [
                    [
                        'size' => 'Standard',
                        'color' => 'Blue/Yellow',
                        'price' => 34.99,
                        'images' => ['product1.jpg', 'product2.jpg']
                    ]
                ],
                'images' => ['product1.jpg', 'product2.jpg']
            ]
        ];

        foreach ($products as $productData) {
            $variants = $productData['variants'];
            $images = $productData['images'];
            unset($productData['variants'], $productData['images']);

            $product = Product::create($productData);

            // Create product images
            foreach ($images as $image) {
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => 'customer/images/' . $image
                ]);
            }

            // Create variants and their images
            foreach ($variants as $variantData) {
                $variantImages = $variantData['images'];
                unset($variantData['images']);
                $variantData['product_id'] = $product->id;

                $variant = ProductVariant::create($variantData);

                foreach ($variantImages as $image) {
                    ProductVariantImage::create([
                        'product_variant_id' => $variant->id,
                        'image_path' => 'customer/images/' . $image
                    ]);
                }
            }
        }
    }
} 