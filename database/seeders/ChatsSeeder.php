<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChatsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('chats')->insert([
            [
                'send_chat'=>'siapa kamu?',
                'get_chat'=>'saya sinta, guru matematika ai',
                'created_at'=>now()
            ],
            [
                'send_chat'=>'sinta akan mengajar materi apa?',
                'get_chat'=>'mengajar persamaan linear',
                'created_at'=>now()
            ]
        ]);
    }
}
