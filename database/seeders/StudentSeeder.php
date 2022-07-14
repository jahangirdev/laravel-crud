<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Str;
class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i<50; $i++){
            $data = array();
            $data['name'] = Str::random(rand(4, 10)).' '.Str::random(rand(4, 10));
            $data['class_id'] = rand(1, 10);
            $data['roll'] = rand(1, 1000);
            $data['phone'] = '+880'.rand(1000000000, 1999999999);
            $data['email'] = Str::random(rand(4,10)).rand(1,100).'@gmail.com';
            DB::table('students')->insert($data);
        }
    }
}
