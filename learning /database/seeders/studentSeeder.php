<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\student;

class studentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students= collect([
            [
                "name" => "Arbeen Shrestha ",
                "email" => "arbeencerestha07@gmail.com"
            ],
            [
                "name" => "Radhika Shrestha ",
                "email" => "radhikashrestha@gmail.com"
            ],
            [
                "name" => "Aradhay Shrestha",
                "email" => "aradhya@gmail.com"
            ],
            [
                "name" => "rajmanshrestha",
                "email" => "rajmanshrestha@gmail.com"

                ],

        ]);


        $students->each(function($student){
            student::create($student);

        });




        // student::create([
        //     "name" => "arbin Thapa magar",
        //     "email" => "arbinbabuthapamagar2002@gmail.com"
        // ]);
    }
}
