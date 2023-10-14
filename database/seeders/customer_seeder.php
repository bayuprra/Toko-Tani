<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class customer_seeder extends Seeder
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
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'name'          => 'usersatu',
                'phone'         => '9897877',
                'alamat'        => 'jl. maju makmur nomor 2',
                'account_id'    => 2,
            ],
            [
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'name'          => 'userdua',
                'phone'         => '',
                'alamat'        => '',
                'account_id'    => 3,
            ]
        ];

        foreach ($data as $item) {
            Customer::create($item);
        }
    }
}
