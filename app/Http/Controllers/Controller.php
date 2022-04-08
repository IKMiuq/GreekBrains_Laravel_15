<?php

namespace App\Http\Controllers;

use Faker\Factory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getNews( int $section_id = null, int $id = null, int $count = 10) : array
    {
        $faker = Factory::create();
        $statusList = ["Draft", "Active", "Blocked"];
        if (!empty($id)) {
            return [
                'id' => $count,
                'title' => $faker->jobTitle(),
                'author' => $faker->userName(),
                'image' => $faker->imageURL(250, 170),
                'status' => $statusList[mt_rand(0,2)],
                'discription' => $faker->text(100),
            ];
        }

        $data=[];
        while ($count > 0) {
            $data[] = [
                'id' => $count,
                'section_id' => rand(1,5),
                'title' => $faker->jobTitle(),
                'author' => $faker->userName(),
                'image' => $faker->imageURL(250, 170),
                'status' => $statusList[mt_rand(0,2)],
                'discription' => $faker->text(100),
            ];
            $count--;
        }
        return $data;
    }

    public function getSections(int $count = 3) : array
    {
        $faker = Factory::create();

        $data=[];
        while ($count > 0) {
            $data[] = [
                'id' => $count,
                'title' => $faker->jobTitle(),
                'image' => $faker->imageURL(250, 170),
                'discription' => $faker->text(100),
            ];
            $count--;
        }
        return $data;
    }
}
