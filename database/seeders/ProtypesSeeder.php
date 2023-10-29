<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Str;

class ProtypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('protypes')->insert([
            ['type_name' => 'Birthday'],
            ['type_name' => 'Wedding'],
            ['type_name' => 'Cookie'],
            ['type_name' => 'Cannelés'],
            ['type_name' => 'Summer Cakes'],
        ]);
    }
}
