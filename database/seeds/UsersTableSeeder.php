<?php

use Illuminate\Database\Seeder;
use App\Http\Model\User\Basic\Users;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Users::create([
            'name'=> 'Leo',
            'email'=> 'leowang10251025@gmail.com',
            'password'=> '$2y$10$rjgMxvujxnbeLn7r/ziAD.cgwhHG4ah1xmIh3iuHBZBM5duFhaiUS',
            'created_at'=> '2024-09-09 14:08:33',
            'updated_at'=> '2024-09-09 14:08:33'
        ]);

        Users::create([
            'name'=> 'Leo2',
            'email'=> 'leowang1025jobs@gmail.com',
            'password'=> '$2y$10$ohS10ARzsebEhf7UT4.RT.9PYzXsMWPyU4l2/wi1Wvuf1ktrZDtZW',
            'created_at'=> '2024-09-17 04:58:51',
            'updated_at'=> '2024-09-17 04:58:51'
        ]);
    }
}
