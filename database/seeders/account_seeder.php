<?php

namespace Database\Seeders;

use App\Models\Account;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class account_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'email'         => 'admin@gmail.com',
                'password'      => bcrypt("admin123"),
                'role_id'       => 1,
                'aktivasi'      => 1,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'email'         => 'user1@gmail.com',
                'password'      => bcrypt("user1234"),
                'role_id'       => 2,
                'aktivasi'      => 0,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'email'         => 'user2@gmail.com',
                'password'      => bcrypt("user1234"),
                'role_id'       => 2,
                'aktivasi'      => 0,
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            ]
        ];

        foreach ($data as $item) {
            Account::create($item);
        }
    }
}
