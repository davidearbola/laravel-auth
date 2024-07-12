<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

use function Laravel\Prompts\text;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 10; $i++) {
            $newProject = new Project();
            $newProject->name = $faker->sentence(2);
            $newProject->type_id = $faker->numberBetween(1, 4);
            $newProject->description = $faker->sentence(20);
            $newProject->release_year = $faker->year($max = 'now');
            $newProject->site_url = $faker->sentence(10);
            $newProject->thumb_path = "https://picsum.photos/id/" . rand(1, 500) . "/1600/900";
            $newProject->save();
        }
    }
}
