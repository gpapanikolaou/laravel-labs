<?php

namespace Database\Seeders;
use App\Models\Department;
use Illuminate\Database\Seeder;
use App\Models\User;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departments = Department::factory()->times(10)->create();

        $users = User::all();

        $users->each(function($user) use ($departments) {
            $ids = $departments->random(5)->pluck('id');

            $user->departments()->sync($ids);
        });
    }
}
