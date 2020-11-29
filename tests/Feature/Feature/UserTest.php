<?php

namespace Tests\Feature\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;


class UserTest extends TestCase
{
    use RefreshDatabase;

    private $users;

    protected $seed=true;

    protected function setUp():void{
        parent::setUp();

        $this->users=User::all();
    }

    use WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testgetUsers()
    {
        $response = $this->json('GET', '/api/users');
       
        $response->assertStatus(200)->assertJSon(['users' =>[]]);
    }

    public function testgetUser(){
        $id=$this->users->random()->id;
        $response = $this->json('GET','/api/users/'.$id);
        $response->assertStatus(200)->assertJSon(['user'=>[]]);
    }

    public function testCreateUser(){
        $response = $this->json('POST', '/api/users/',['firstName' =>$this->faker->firstName,'lastName'=>$this->faker->lastName,
        'email'=>$this->faker->safeEmail,'password' =>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi']);
        $response->assertCreated();
    }

    public function testUpdateUser(){
        $id=$this->users->random()->id;
        // $response =$this->json('PUT','/api/users/'.$id, ['firstName'=>])
    }
}
