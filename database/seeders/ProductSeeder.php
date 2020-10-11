<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $products = collect([
            [
                'name'  => 'Baju Bola Madrid',
                'desc'  => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt, id?',
                'price' => 75000,
                'stock' => 20
            ],
            [
                'name'  => 'Baju Bola Liverpool',
                'desc'  => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt, id?',
                'price' => 75000,
                'stock' => 22
            ],
            [
                'name'  => 'Baju Bola MU',
                'desc'  => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt, id?',
                'price' => 75000,
                'stock' => 11
            ],
            [
                'name'  => 'Baju Bola MC',
                'desc'  => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt, id?',
                'price' => 75000,
                'stock' => 12
            ],
            [
                'name'  => 'Baju Bola Tottenham',
                'desc'  => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt, id?',
                'price' => 75000,
                'stock' => 31
            ]
        ]);
        $products->each(function ($product) {
            Product::create([
                'name'  => $product['name'],
                'desc'  => $product['desc'],
                'price' => $product['price'],
                'stock' => $product['stock']
            ]);
        });
    }
}
