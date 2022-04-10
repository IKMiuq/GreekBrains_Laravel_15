<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use mysql_xdevapi\Table;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('news')->insert($this->getData());
    }

    private function getData(): array
    {
        $faker = Factory::create();
        $data = [];
        for ($i = 0; $i < 15; $i++) {
            $data[] = [
                'category_id' => rand(1,5),
                'title' => $faker->jobTitle(),
                'author' => $faker->userName(),
                'image' => $faker->imageURL(250, 170),
                'status' => 'ACTIVE',
                'description' => $faker->text(100),
            ];
        }
        return $data;
    }
}
