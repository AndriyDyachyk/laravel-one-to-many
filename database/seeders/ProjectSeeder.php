<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Project;
class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i=1; $i<11; $i++){
            $project = new Project();

            $project->title = $faker->sentence(3);
            $project->description = $faker->text(500);
            $project->used_apps = $faker->words( 2, true);
            $project->img = $faker->imageUrl(640, 480, 'animals', true);
            $project->slug = $project->generateSlug($project->title);

            $project->save();
        }
    }
}
