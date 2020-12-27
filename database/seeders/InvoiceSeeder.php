<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class InvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('invoice')->truncate(); //for cleaning earlier data to avoid duplicate entries
        DB::table('invoice')->insert([
            'billing_name' => 'BRD202001',
            'billing_type' => 'INVOICE',
            'product' => 'Coca Cola',
            'quantity' => rand(1,10),
            'product_type' => 'drink',
            'customerName' => 'Furkan',
            'created_at' => (new \DateTime())->format('Y-m-d H:i:s'),
        ]);
        DB::table('invoice')->insert([
            'billing_name' => 'BRD202002',
            'billing_type' => 'INVOICE',
            'product' => 'Fanta',
            'quantity' => rand(1,10),
            'product_type' => 'drink',
            'customerName' => 'Furkan',
            'created_at' => (new \DateTime())->format('Y-m-d H:i:s'),
        ]);
        DB::table('invoice')->insert([
            'billing_name' => 'ORD202001',
            'billing_type' => 'ORDER',
            'product' => 'Phone Case',
            'quantity' => rand(1,10),
            'product_type' => 'Accessory',
            'customerName' => 'Atakan',
            'created_at' => (new \DateTime())->format('Y-m-d H:i:s'),
        ]);
        DB::table('invoice')->insert([
            'billing_name' => 'BRD202004',
            'billing_type' => 'INVOICE',
            'product' => 'Radio',
            'quantity' => rand(1,10),
            'product_type' => 'Baofeng Uv-82',
            'customerName' => 'Furkan',
            'created_at' => (new \DateTime())->format('Y-m-d H:i:s'),
        ]);
        DB::table('invoice')->insert([
            'billing_name' => 'ORD202002',
            'billing_type' => 'ORDER',
            'product' => 'NewSchool Nike AirForce',
            'quantity' => rand(1,10),
            'product_type' => 'shoe',
            'customerName' => 'Atakan',
            'created_at' => (new \DateTime())->format('Y-m-d H:i:s'),
        ]);
    }
}
