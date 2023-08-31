<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types= ['frontend', 'backend', 'design', 'e-commerce'];

        foreach ($types as $item) {
            # code...
            $type= new Type();

            $type->name = $item;
            $type->slug = Str::slug($item, '-');

            $type->save();
        }
    }
}
