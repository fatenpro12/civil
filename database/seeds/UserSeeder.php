<?php

use App\Components\User\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create admin account
        $AdminUser = User::create([
            'id'=>1,
            'name' => 'Superadmin',
            'email' => 'admin@example.com',
            'password' => '123456',
            'remember_token' => str_random(10),
            'last_login' => \Carbon\Carbon::now(),
            'active' => \Carbon\Carbon::now(),
            'activation_key' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
        ]);
        $AdminUser->assignRole('superadmin');



        // $type = [
        //     ['id' => 1,'type'=>config('enum.user_types')['SITE_MANAGENMENT'] , 'user_id','1','created_at' => '2019-04-19 07:13:33','updated_at' => '2019-04-19 07:13:33'],
        //   ];
  
        //   DB::table('user_type')->insert($type);


    }
}
