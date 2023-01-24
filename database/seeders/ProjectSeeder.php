<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 100; $i++){
            $new_project = new Project;
            $new_project->user_id = User::inRandomOrder()->first()->id;
            $new_project->name = $faker->sentence();
            $new_project->slug = Project::generateSlug($new_project->name);
            $new_project->client_name = $faker->company();
            $new_project->image = 'https://www.mrw.it/img/cope/0iwkf4_1609360688.jpg';
            $new_project->summary = $faker->paragraph(5);
            $new_project->save();
        }
    }
}
