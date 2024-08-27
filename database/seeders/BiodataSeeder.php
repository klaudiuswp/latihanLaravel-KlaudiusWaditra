<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BiodataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('biodata')->insert([
            [
                'nama_lengkap'=>'klaudius waditra',
                'nik'=>'12345',
                'umur'=>20,
                'alamat'=>'jakarta',
                'created_at'=>now()
            ],
            [
                'nama_lengkap'=>'susi susanti',
                'nik'=>'98765',
                'umur'=>30,
                'alamat'=>'bekasi',
                'created_at'=>now()
            ]
        ]);
    }
}
