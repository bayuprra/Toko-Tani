<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class merk_produk_seeder extends Seeder
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
                'nama'          => 'Gramoxone',
                'deskripsi'     => 'Herbisida Gramoxone untuk membasmi rumput, untuk mengendalikan
                                    gulma berdaun lebar dan sempit dan untuk persiapan lahan budidaya
                                    jagung, padi, kakao, dan kelapa sawit dll.'
            ],
            [
                'nama'          => 'Primatron',
                'deskripsi'     => 'Prima-Tron 135 SL* adalah herbisida non-selektif purna tumbuh denga
                bahan aktif Parakuat Diklorida 135 g/L berbentuk pekatan yang larut
                dalam udara berwrana hijau tua untuk mengendalikan gulma pada
                budidaya kelapa sawit TBM.'
            ],
            [
                'nama'          => 'Sapu Bersih',
                'deskripsi'         => 'Herbisida sapu bersih adalah herbisida yang dapat membunuh gulna
                hingga ke akar-akar nya sehingga proses regrowth gulma akan menjadi
                lambat.'
            ],
            [
                'nama'          => 'Pentsgliz',
                'deskripsi'         => 'Penta Gli-Z 240 SL adalah herbisida sistemik dengan bahan akXf IPA
                Glyfosat 240 g/L berwarna kuning kemerahan berbentuk larutan
                dalam udara untuk mengendalikan gulma golongan rumput dan
                gulma yang dilindungi lebar pada budidaya kopi dan lahan tanaman
                lainnya.'
            ],
            [
                'nama'          => 'Nuclear',
                'deskripsi'         => 'Herbisida sistemik purna tumbuh berbentuk larutan dalam air. Untuk
                membasmi rumput alang-alang.'
            ],
            [
                'nama'          => 'Herbatop',
                'deskripsi'         => 'Herbatop untuk Pengendalian gulma berdaun lebar dan sempit
.Herbisida purna tumbuh yang bersifat kontak berbentuk larutan dalam
udara berwarna coklat gelap digunakan untuk mengendalikan gulma di
pertanaman Karet, Kelapa Sawit, The, Kopi, Tebu, TOT padi Pasang
Surut, Padi Sawah dan Jagung'
            ],
            [
                'nama'          => 'Ridatop',
                'deskripsi'         => 'Herbisida kontak purna tumbuh berbentuk larutan dalam air untuk
                mengendalikan gulma umum pada tanaman kelapa sawit (TBM).'
            ],
            [
                'nama'          => 'Roundup',
                'deskripsi'         => 'Roundup Biosorb 486 SL adalah herbisida purna tumbuh dengan bahan
                aktif glifosat yang diproduksi dengan Teknologi Biosorb serta
                menggunakan surfaktan yang dipatenkan. 3 kali lebih banyak dan lebih
                cepat masuk ke dalam gulma sehingga tahan hujan 1-2 jam setelah
                semprot.'
            ],
            [
                'nama'          => 'Indokuat',
                'deskripsi'         => 'Herbisida IndoKuat adalah Herbisida kontak purna tumbuh berbentuk
                larutan dalam udara, yang efektif mengendalikan gulma pada tanaman
                karet (TBM).
                '
            ],
            [
                'nama'          => 'Starquat',
                'deskripsi'         => 'Starquat 135 SL adalah herbisida purna tumbuh yang bersifat kontak
                berbentuk lingkungan dalam udara berwarna biru kehijauan,
                digunakan untuk mengendalikan gulma berdaun lebar dan gulma
                kelompok rumput pada budidaya kelapa sawit (TBM) dan jagung.'
            ],
            [
                'nama'          => 'Starlon',
                'deskripsi'         => 'Starlon adalah herbisida sistemik dengan bahan ak2f Triklopir BEE. Di
                produksi menggunakan teknologi emulsifier terkini, fleksibel dalam
                penyimpanan dan pada saat membuat larutan induk. Starlon sangat
                efek2f dalam mengendalikan semak belukar, tunggul kayu, dan gulma
                berkayu.'
            ],
            [
                'nama'          => 'Garlon',
                'deskripsi'         => 'Herbisida dan Arborisida sistemik purna tumbuh,
                berbentuk pekatan yang dapat diemulsikan,
                berwarna coklat tua untuk mengendalikan gulma
                berdaun lebar pada pertanaman karet, kelapa
                sawit, lahan tanpa tanaman serta memaXkan
                tanaman karet tua dan tunggul tanaman di areal
                peremajaan. Mengendalikan Gulma Berkayu dan
                Gulma Bandel Lainnya'
            ],
            [
                'nama'          => 'Gallant',
                'deskripsi'         => 'Herbisida sistemik purna tumbuh dengan bahan
                aktif yang belum pernah digunakan dalam
                budidaya kelapa sawit, sehingga dapat dijadikan
                solusi alternative untuk mengendalikan gulma
                berdaun sempit pada budidaya kelapa sawit,
                sejak fase pembibitan,terutama untuk bebas
                rumput.'
            ],
            [
                'nama'          => 'Lindomin',
                'deskripsi'         => 'Lindomin memiliki kandungan fenol terendah
                sehingga aman bagi pengguna dan tanaman
                utama.Xdak membentuk kristal pada kemasan, dan
                bisa digunakan dengan berbagai kondisi udara di
                lapangan dengan kinerja yang tetap opXmal.
                Handal dalam mengendalikan gulma berdaun lebar
                dan teki-tekian.'
            ],
            [
                'nama'          => 'Benup',
                'deskripsi'         => 'Herbisida sistemik purna tumbuh berbentuk larutan dalam air untuk
                mengendalikan gulma umum pada kelapa sawit (TBM).'
            ],
            [
                'nama'          => 'Turmadan',
                'deskripsi'         => 'Turmadan merupakan herbisida kontak purna tumbuh yan berbentuk
                larutan dalam air untuk mengendalikan gulma berdaun lebar dan
                golongan rumput .'
            ],
            [
                'nama'          => 'Rinjani',
                'deskripsi'         => 'Rinjani 490 SL merupakan herbisida sistemik purna tumbuh, dan
                memiliki spektrum luas, sehingga ampuh mengendalikan gulma
                hingga ke akar-akarnya.'
            ],
            [
                'nama'          => 'Lalangup',
                'deskripsi'         => 'Herbisida sistemik pra tumbuh dan purna tumbuh berbentuk larutan
                dalam air, untuk mengendalikan gulma berdaun lebar dan gulma
                golongan rumput pada budidaya kelapa sawit.'
            ],
            [
                'nama'          => 'Kresnatop',
                'deskripsi'         => 'Kresnatop adalah merupakan herbisida sistemik purna tumbuh
                berbentuk larutan dalam udara berwarna coklat keemasan untuk
                mengendalikan gulma yang dikelola lebar dan sempit pada budidaya
                kelapa sawit belum menghasilkan (TBM).
                Bahan akXf ametrin Xdak membuat tebu/kelapa sawit stres atau maX
                namun bisa membasmi rumput pembohong yang berada di sekitarnya
                (selekXf).'
            ],
            [
                'nama'          => 'Bablas',
                'deskripsi'         => 'Herbisida sistemik purna tumbuh berbentuk larutan dalam udara yang
                digunakan untuk Budidaya kelapa sawit (TBM) : gulma yang dilindungi
                lebar Ageratum conyzoides, Borreria alata, Melastoma affine, Mikania
                micrantha, gulma berdaun sempit Axonopus kompresus.'
            ],
            [
                'nama'          => 'Omnitop',
                'deskripsi'         => 'Omni-Top 276 SL* adalah Herbisida purna tumbuh dengan bahan aktif
                non-selektif Parakuat Diklorida 276 g/L berbentuk pekatan berwarna
                biru tua yang dapat larut dalam udara untuk mengendalikan gulma
                berdaun lebar dan gulma berdaun sempit pada tanaman kelapa sawit'
            ]
            // [
            //     'nama'          => 'Garlon',
            //     'deskripsi'         => ''
            // ],
            // [
            //     'nama'          => 'Garlon',
            //     'deskripsi'         => ''
            // ],
            // [
            //     'nama'          => 'Garlon',
            //     'deskripsi'         => ''
            // ],
            // [
            //     'nama'          => 'Garlon',
            //     'deskripsi'         => ''
            // ],
            // [
            //     'nama'          => 'Garlon',
            //     'deskripsi'         => ''
            // ],
            // [
            //     'nama'          => 'Garlon',
            //     'deskripsi'         => ''
            // ],
            // [
            //     'nama'          => 'Garlon',
            //     'deskripsi'         => ''
            // ],
            // [
            //     'nama'          => 'Garlon',
            //     'deskripsi'         => ''
            // ]
        ];

        foreach ($data as $item) {
            DB::table('merk_produk')->insert($item);
        }
    }
}
