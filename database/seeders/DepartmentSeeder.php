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
        Department::factory()->times(10)->has(User::factory())->create();
    }
}
