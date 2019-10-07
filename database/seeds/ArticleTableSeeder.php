<?php

use App\Article;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Article::truncate();

        $faker = Factory::create();

        for($i=0;$i<5;$i++){
            Article::create([
                'title'=>$faker->sentence,
                'body'=>$faker->paragraph,
            ]);
        }
    }
}
