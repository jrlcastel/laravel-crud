<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('customers')->insert(['name'=>'Customer 1']);
        DB::table('customers')->insert(['name'=>'Customer 2']);
        DB::table('customers')->insert(['name'=>'Customer 3']);
        DB::table('customers')->insert(['name'=>'Customer 4']);
        
        DB::table('cashiers')->insert(['name'=>'Cashier 1']);
        DB::table('cashiers')->insert(['name'=>'Cashier 2']);
        DB::table('cashiers')->insert(['name'=>'Cashier 3']);
        DB::table('cashiers')->insert(['name'=>'Cashier 4']);

        DB::table('items')->insert(['name'=>'Item 1']);
        DB::table('items')->insert(['name'=>'Item 2']);
        DB::table('items')->insert(['name'=>'Item 3']);
        DB::table('items')->insert(['name'=>'Item 4']);


        DB::table('receipts')->insert([
            'customer_id'=>1,
            'cashier_id'=>1,
            'total'=>100,
        ]);

        DB::table('receipts')->insert([
            'customer_id'=>2,
            'cashier_id'=>2,
            'total'=>200,
        ]);

        DB::table('receipts')->insert([
            'customer_id'=>3,
            'cashier_id'=>3,
            'total'=>300,
        ]);

        DB::table('receipts')->insert([
            'customer_id'=>4,
            'cashier_id'=>4,
            'total'=>400,
        ]);



        DB::table('sales')->insert([
            'receipt_id'=>1,
            'item_id'=>1,
        ]);

        DB::table('sales')->insert([
            'receipt_id'=>2,
            'item_id'=>2,
        ]);

        DB::table('sales')->insert([
            'receipt_id'=>3,
            'item_id'=>3,
        ]);

        DB::table('sales')->insert([
            'receipt_id'=>4,
            'item_id'=>4,
        ]);


    }
}
