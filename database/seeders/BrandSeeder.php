<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Brand;
use Faker\Factory;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Factory::create();
        foreach(range(1, 10) as $index){
            $name=substr($faker->unique()->name, 0, 10);
            Brand::create([
                'name' => $name,
                'slug' => $name,
                'status' => $this->randomStatus(),
                'create_by'=>rand(1, 11),
            ]);
        }

        // $json = File::get(storage_path('my-data/brand.json'));
        // $data = json_decode($json, true);
        // foreach ($data as $key => $value){
        //     Brand::create($value);
        // }

    }

    public function randomStatus(){
        return array_rand(['active'=> 'active' , 'inactive' => 'inactive'], 1);
    }
}
