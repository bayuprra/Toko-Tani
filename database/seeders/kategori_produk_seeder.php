<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class kategori_produk_seeder extends Seeder
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
                'nama'          => 'HERBISIDA',
                'deskripsi'     => ' '
            ],
            [
                'nama'          => 'INSEKTISIDA',
                'deskripsi'         => ' '
            ],
            [
                'nama'          => 'FUNGISIDA',
                'deskripsi'         => ' '
            ],
            [
                'nama'          => 'BENIH',
                'deskripsi'         => ' '
            ],
            [
                'nama'          => 'PUPUK',
                'deskripsi'         => ' '
            ],
            [
                'nama'          => 'ALAT PERTANIAN',
                'deskripsi'         => ' '
            ]
        ];

        foreach ($data as $item) {
            DB::table('kategori_produk')->insert($item);
        }
    }
}
