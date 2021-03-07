<?php

namespace Database\Seeders;

use App\Models\Category;
use Faker\Factory;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker= Factory::create();

        foreach(range( 1, 30) as $index){
            $name = substr($faker->name, 0, 10);
            Category::create([
                'root'      => rand( 0, 5 ),
                'name'      => $name,
                'slug'      => slugify($name),
                'status'    => $this->randomStatus(),
                'create_by' => rand(1, 5),

            ]);
        }
    }

    public function randomStatus(){
        return array_rand(['active'=>'active', 'inactive'=>'inactive'], 1);
    }
}
