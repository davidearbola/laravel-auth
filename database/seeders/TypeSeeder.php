<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $newType = new Type();
        $newType->name = 'Front-end';
        $newType->description = 'Tipo di sviluppo con tecnologie Front-end';
        $newType->icon = 'fa-solid fa-laptop-code';
        $newType->save();

        $newType = new Type();
        $newType->name = 'Back-end';
        $newType->description = 'Tipo di sviluppo con tecnologie Back-end';
        $newType->icon = 'fa-solid fa-gears';
        $newType->save();

        $newType = new Type();
        $newType->name = 'Full-stack';
        $newType->description = 'Tipo di sviluppo con tecnologie Full-stack';
        $newType->icon = 'fa-brands fa-connectdevelop';
        $newType->save();

        $newType = new Type();
        $newType->name = 'Design';
        $newType->description = 'Tipo di sviluppo con tecnologie Design';
        $newType->icon = 'fa-solid fa-wand-magic-sparkles';
        $newType->save();
    }
}
