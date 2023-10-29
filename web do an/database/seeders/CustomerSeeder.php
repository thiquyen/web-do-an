<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Str;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Pass người dùng = 12345678
        DB::table('customer')->insert([
            ['customer_name' => 'Nguyen Thi Quyen','email' => 'Quyen@gmail.com','password' => '123456789','phone'=>'0987654321','address'=>'Bình thuận','status'=>'1','token'=>null],
            ['customer_name' => 'Nguyen Hong Hao','email' => 'Hao@gmail.com','password' => '123456789','phone'=>'0987654321','address'=>'Bình thuận','status'=>'1','token'=>null],
        ]);
    }
}
