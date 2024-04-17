<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProfileTest extends TestCase
{
    use RefreshDatabase;

    public function test_profile_page_is_displayed(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get('/profile');

        $response->assertOk();
    }

    public function test_profile_information_can_be_updated(): void
    {
        // Create a user
        $user = User::factory()->create();
    
        // Simulate updating the user's profile
        $response = $this->actingAs($user)
            ->patch('/profile', [
                'name' => 'Updated Name',
                'email' => 'updated@example.com',
                'address' => '123 Test St', 
                'gender' => 'female', 
                'job'=>'soft enginner',
                'dob' => '1990-01-01', // Example additional field
                'experience' => '3 years',
                'bio' => 'Lorem ipsum', 
                'phone'=>'+212 6 78 12 09 12',
                'cover_letter' => UploadedFile::fake()->create('cover_letter.pdf'),
                'resume' => UploadedFile::fake()->create('resume.pdf'), 
                'avatar' => UploadedFile::fake()->image('avatar.jpg')             ]);
    
        // Verify that there are no session errors and the user is redirected to the profile page
        $response->assertSessionHasNoErrors()
                 ->assertRedirect('/profile');
    
        // Refresh the user model to get the latest data from the database
        $user->refresh();
    
        // Assert that the user's name and email have been updated correctly
        $this->assertSame('Updated Name', $user->name);
        $this->assertSame('updated@example.com', $user->email);
    
        // Assert that the email verification status remains unchanged
    
        // Assert that other profile fields have been updated correctly
        $this->assertSame('female', $user->gender);
        $this->assertSame('1990-01-01', $user->dob);
        // Add assertions for other fields as needed
    }
    
    
    

    public function test_email_verification_status_is_unchanged_when_the_email_address_is_unchanged(): void
    {
        $user = User::factory()->create();
    
        $response = $this
            ->actingAs($user)
            ->patch('/profile', [
                'name' => 'Test User',
                'email' => $user->email,
                'address' => '123 Test St', 
                'gender' => 'male', 
                'dob' => '1990-01-01', 
                'experience' => '3 years',
                'bio' => 'Lorem ipsum', 
                'phone'=>'+212 6 78 12 09 12',
                'job'=>'soft enginner',
                'cover_letter' => UploadedFile::fake()->create('cover_letter.pdf'),
                'resume' => UploadedFile::fake()->create('resume.pdf'), 
                'avatar' => UploadedFile::fake()->image('avatar.jpg') 
            ]);
    
        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('/profile');
    
        $this->assertNotNull($user->refresh()->email_verified_at);
    }
    
    public function test_user_can_delete_their_account(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->delete('/profile', [
                'password' => 'password',
            ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('/');

        $this->assertGuest();
        $this->assertNull($user->fresh());
    }

    public function test_correct_password_must_be_provided_to_delete_account(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->from('/profile')
            ->delete('/profile', [
                'password' => 'wrong-password',
            ]);

        $response
            ->assertSessionHasErrorsIn('userDeletion', 'password')
            ->assertRedirect('/profile');

        $this->assertNotNull($user->fresh());
    }
}
