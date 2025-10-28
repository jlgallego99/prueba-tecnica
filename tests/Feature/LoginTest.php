<?php

use App\Http\Livewire\Login;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Hash;
use Livewire\Livewire;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

it('authenticates a correct user successfully', function () {
    $user = User::factory()->create([
        'email' => 'test@example.com',
        'password' => Hash::make('test123456'),
    ]);

    Livewire::test(Login::class)
        ->set('email', 'test@example.com')
        ->set('password', 'test123456')
        ->call('submit')
        ->assertRedirect(route('dashboard'));

    expect(auth()->check())->toBeTrue();
});

it('does not authenticate an incorrect user', function () {
    $test = Livewire::test(Login::class)
            ->set('email', 'test@example.com')
            ->set('password', 'test123456')
            ->call('submit');;

    expect(auth()->check())->not->toBeTrue();
    $test->assertHasErrors(['credentials']);
});
