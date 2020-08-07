<?php

use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('suppliers')->insert([
            'supplier_name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'address' => Str::random(10),
            'address' => Str::random(10),
            'address' => Str::random(10),
            'address' => Str::random(10),

        ]);
    }
}
