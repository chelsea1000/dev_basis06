<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Team;

class TeamsTableSeeder extends Seeder
{
    //テーブルにデータを入れる役割
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Team::create([
            'id' => 1,
            'name' => 'レアル・マドリード',
        ]);
        
        Team::create([
            'id' => 2,
            'name' => 'バルセロナ',
        ]);
        
        Team::create([
            'id' => 3,
            'name' => 'アトレティコ・マドリード',
        ]);
        
        Team::create([
            'id' => 4,
            'name' => 'ビジャレアル',
        ]);
        
        Team::create([
            'id' => 5,
            'name' => 'アトレティック・クルブ',
        ]);
        
        Team::create([
            'id' => 6,
            'name' => 'マジョルカ',
        ]);
        
        Team::create([
            'id' => 7,
            'name' => 'オサスナ',
        ]);
        
        Team::create([
            'id' => 8,
            'name' => 'レアル・ベティス',
        ]);
        
        Team::create([
            'id' => 9,
            'name' => 'ラージョ',
        ]);
        
        Team::create([
            'id' => 10,
            'name' => 'セルタ',
        ]);
        
        Team::create([
            'id' => 11,
            'name' => 'アラベス',
        ]);
        
        Team::create([
            'id' => 12,
            'name' => 'ジローナ',
        ]);
        
        Team::create([
            'id' => 13,
            'name' => 'セビージャ',
        ]);
        
        Team::create([
            'id' => 14,
            'name' => 'レアル・ソシエダ',
        ]);
        
        Team::create([
            'id' => 15,
            'name' => 'ヘタフェ',
        ]);
        
        Team::create([
            'id' => 16,
            'name' => 'レガ',
        ]);
        
        Team::create([
            'id' => 17,
            'name' => 'エスパニョール',
        ]);
        
        Team::create([
            'id' => 18,
            'name' => 'バレンシア',
        ]);
        
        Team::create([
            'id' => 19,
            'name' => 'バジャドリー',
        ]);
        
        Team::create([
            'id' => 20,
            'name' => 'ラス・パルマス',
        ]);
    }
}
