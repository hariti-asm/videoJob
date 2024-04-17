<?php

namespace Tests\Feature\Auth;

use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_screen_can_be_rendered(): void
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function test_new_users_can_register(): void
    {
        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'address' => '123 Test St', 
            'gender' => 'male', 
            'dob' => '1990-01-01', 
            'experience' => '3 years',
            'bio' => 'Lorem ipsum', 
            'phone'=>'+212 6 78 12 09 12',
            'job'=>'soft engineer',
            'status'=>"seeker",
            'cover_letter' => UploadedFile::fake()->create('cover_letter.pdf'),
            'resume' => UploadedFile::fake()->create('resume.pdf'), 
            'avatar' => UploadedFile::fake()->image('avatar.jpg') 
        ]);

        $this->assertAuthenticated();
    }
}
