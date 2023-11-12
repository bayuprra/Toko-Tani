<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Status_orderSeeder extends Seeder
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
                'nama'          => 'belum dibayar',
            ],
            [
                'nama'          => 'dibayar',
            ],
            [
                'nama'          => 'proses',
            ],
            [
                'nama'          => 'dikirim',
            ],
            [
                'nama'          => 'diterima',
            ],
            [
                'nama'          => 'cancel',
            ]
        ];

        foreach ($data as $item) {
            DB::table('status_order')->insert($item);
        }
    }
}
