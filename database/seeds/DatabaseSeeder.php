<?php

use App\Category;
use App\Company;
use App\Job;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        factory(User::class, 20)->create();
        factory(Company::class, 20)->create();
        factory(Job::class, 20)->create();
        $categories = [
            'Technology',
            'Engineering',
            'Government',
            'Medical',
            'Construction',
            'Software'
        ];
        foreach ($categories as $category){
            Category::create(['name'=>$category]);
        }
    }
}
