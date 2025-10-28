<?php

use App\Http\Livewire\Login;
use App\Http\Livewire\Register;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Hash;
use Livewire\Livewire;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

uses(TestCase::class, RefreshDatabase::class);

it('creates an user correctly', function () {
    Livewire::test(Register::class)
        ->set('name', 'Johnny Test')
        ->set('email', 'test@example.com')
        ->set('password', 'test123456')
        ->set('password_confirmation', 'test123456')
        ->call('submit')
        ->assertRedirect(route('dashboard'));

    $exists = User::query()->where('email', 'test@example.com')->exists();
    expect($exists)->toBeTrue();
    expect(auth()->check())->toBeTrue();
});

it('invalidates an incorrect email', function () {
    $test = Livewire::test(Register::class)
        ->set('name', 'Johnny Test')
        ->set('email', 'invalid-email')
        ->set('password', 'test123456')
        ->call('submit')
        ->assertNoRedirect();

    $test->assertHasErrors(['email']);
});

it('invalidates a short password', function () {
    $test = Livewire::test(Register::class)
        ->set('name', 'Johnny Test')
        ->set('email', '1')
        ->set('password', '1')
        ->call('submit')
        ->assertNoRedirect();

    $test->assertHasErrors(['password']);
});
