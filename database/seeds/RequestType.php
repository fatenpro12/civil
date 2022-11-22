<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class RequestType extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $requests = [
            ['id' => '1','name' => 'Test','created_at' => '2019-04-18 12:26:57','updated_at' => '2019-04-18 12:26:57'],
            ['id' => '2','name' => 'Support','created_at' => '2019-04-19 07:13:33','updated_at' => '2019-04-19 07:13:33'],
          ];
  
          DB::table('request_types')->insert($requests);
    }
}
