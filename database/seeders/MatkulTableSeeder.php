<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MatkulTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private $_matkuls = [
        [
            "nama_matkul" => "Matematika Diskrit",
            "keminatan_matkul" => "biasa aja",
            "alasan_matkul" => "kebayankan teori soalnya jadi kadang ngantuk",
            "created_at" => "2021-01-01 00:00:00",
            "updated_at" => "2021-01-01 00:00:00",
        ],
        [
            "nama_matkul" => "Pemrograman Web",
            "keminatan_matkul" => "sangat suka",
            "alasan_matkul" => "banyak praktiknya tidak membutuhkan spek pc tinggi, pokoknya enak",
            "created_at" => "2021-01-01 00:00:00",
            "updated_at" => "2021-01-01 00:00:00",
        ],
        [
            "nama_matkul" => "Pemrograman Berorientasi Objek",
            "keminatan_matkul" => "lumayan suka",
            "alasan_matkul" => "kodingan makin keren dan panjang karena menggunakan Java",
            "created_at" => "2021-01-01 00:00:00",
            "updated_at" => "2021-01-01 00:00:00",
        ],
        [
            "nama_matkul" => "Pemrograman Mobile",
            "keminatan_matkul" => "agak tertarik",
            "alasan_matkul" => "agak tertarik namun kurang suka karena membutuhkan spek pc yang high end",
            "created_at" => "2021-01-01 00:00:00",
            "updated_at" => "2021-01-01 00:00:00",
        ],
        [
            "nama_matkul" => "Pemrograman Desktop",
            "keminatan_matkul" => "tidak tahu",
            "alasan_matkul" => "tidak tau karena belum pernah dapet mata kuliah pemrograman dekstop",
            "created_at" => "2021-01-01 00:00:00",
            "updated_at" => "2021-01-01 00:00:00",
        ],
        [
            "nama_matkul" => "Pemrograman Game",
            "keminatan_matkul" => "biasa aja",
            "alasan_matkul" => "kebayankan teori",
            "created_at" => "2021-01-01 00:00:00",
            "updated_at" => "2021-01-01 00:00:00",
        ],
        [
            "nama_matkul" => "Pemrograman Web Lanjut",
            "keminatan_matkul" => "biasa aja",
            "alasan_matkul" => "kebayankan teori",
            "created_at" => "2021-01-01 00:00:00",
            "updated_at" => "2021-01-01 00:00:00",
        ],
        [
            "nama_matkul" => "Pemrograman Mobile Lanjut",
            "keminatan_matkul" => "biasa aja",
            "alasan_matkul" => "kebayankan teori",
            "created_at" => "2021-01-01 00:00:00",
            "updated_at" => "2021-01-01 00:00:00",
        ],
        [
            "nama_matkul" => "Pemrograman Desktop Lanjut",
            "keminatan_matkul" => "biasa aja",
            "alasan_matkul" => "kebayankan teori",
            "created_at" => "2021-01-01 00:00:00",
            "updated_at" => "2021-01-01 00:00:00",
        ],
        [
            "nama_matkul" => "Pemrograman Game Lanjut",
            "keminatan_matkul" => "biasa aja",
            "alasan_matkul" => "kebayankan teori",
            "created_at" => "2021-01-01 00:00:00",
            "updated_at" => "2021-01-01 00:00:00",
        ],
        [
            "nama_matkul" => "Pemrograman Berorientasi Objek Lanjut",
            "keminatan_matkul" => "biasa aja",
            "alasan_matkul" => "kebayankan teori",
            "created_at" => "2021-01-01 00:00:00",
            "updated_at" => "2021-01-01 00:00:00",
        ],
        [
            "nama_matkul" => "Pemrograman Berorientasi Objek Lanjut",
            "keminatan_matkul" => "biasa aja",
            "alasan_matkul" => "kebayankan teori",
            "created_at" => "2021-01-01 00:00:00",
            "updated_at" => "2021-01-01 00:00:00",
        ],
        [
            "nama_matkul" => "Pemrograman Berorientasi Objek Lanjut",
            "keminatan_matkul" => "biasa aja",
            "alasan_matkul" => "kebayankan teori",
            "created_at" => "2021-01-01 00:00:00",
            "updated_at" => "2021-01-01 00:00:00",
        ],
        [
            "nama_matkul" => "Pemrograman Berorientasi Objek Lanjut",
            "keminatan_matkul" => "biasa aja",
            "alasan_matkul" => "kebayankan teori",
            "created_at" => "2021-01-01 00:00:00",
            "updated_at" => "2021-01-01 00:00:00",
        ],
        [
            "nama_matkul" => "Pemrograman Berorientasi Objek Lanjut",
            "keminatan_matkul" => "biasa aja",
            "alasan_matkul" => "kebayankan teori",
            "created_at" => "2021-01-01 00:00:00",
            "updated_at" => "2021-01-01 00:00:00",
        ]

    ];
    public function run()
    {
        $data = [];
        foreach ($this->_matkuls as $matkul){
            $data[] = [
                'nama_matkul' => $matkul['nama_matkul'],
                'keminatan_matkul' => $matkul['keminatan_matkul'],
                'alasan_matkul' => $matkul['alasan_matkul'],
                'created_at' => $matkul['created_at'],
                'updated_at' => $matkul['updated_at']
            ];
        }
        DB::table('matkuls')->insert($data);
    }
}
