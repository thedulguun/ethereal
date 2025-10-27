<?php

namespace Tests\Feature\Account;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AccountUpdateTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_update_account_details(): void
    {
        Storage::fake('public');

        $user = User::factory()->create([
            'profile_photo_path' => null,
        ]);

        $this->actingAs($user);

        $response = $this->from(route('account.edit'))->put(route('account.update'), [
            'name' => 'Updated Name',
            'username' => 'updatedname',
            'email' => 'updated@example.com',
            'date_of_birth' => '1990-10-10',
            'home_address' => '123 Updated Street',
            'password' => 'newpassword',
            'password_confirmation' => 'newpassword',
            'profile_photo' => UploadedFile::fake()->image('avatar.jpg', 200, 200),
        ]);

        $response->assertRedirect(route('account.edit'));
        $response->assertSessionHas('status');

        $user->refresh();

        $this->assertSame('Updated Name', $user->name);
        $this->assertSame('updatedname', $user->username);
        $this->assertSame('updated@example.com', $user->email);
        $this->assertSame('1990-10-10', optional($user->date_of_birth)->format('Y-m-d'));
        $this->assertSame('123 Updated Street', $user->home_address);
        $this->assertTrue(Hash::check('newpassword', $user->password));
        $this->assertNotNull($user->profile_photo_path);

        Storage::disk('public')->assertExists($user->profile_photo_path);
    }
}
