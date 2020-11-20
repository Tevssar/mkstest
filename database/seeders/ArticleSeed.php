<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ArticleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $i = 0;
        while ($i < 20) {
            $id = DB::table('articles')->insertGetId(
                [
                'cover' => 'ph',
                'text' => Str::random(100),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]
            );
            $j = 0;
            while ($j < 2) {
                DB::table('article_tag')->insert(
                    [
                    'articles_id' => $id,
                    'article_tags_id' => rand(1, 10),
                    ]
                );
                $j++;
            }
            $i++;
        }
    }
}
