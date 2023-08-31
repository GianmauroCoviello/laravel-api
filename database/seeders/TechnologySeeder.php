<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use App\Models\Type;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technologies = ['HTML','CSS','Javascript','VueJs','Laravel', 'Vite','Php'];

        foreach ($technologies as $tech) {
            # code...
            $new_tech= new Technology();

            $new_tech->name = $tech;
            $new_tech->slug = Str::slug($tech, '-');

            $new_tech->save();
        }
    }
}
