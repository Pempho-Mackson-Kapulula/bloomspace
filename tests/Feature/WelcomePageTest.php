<?php

use App\Models\User;

it('displays the welcome page', function () {
    $this->get('/')
        ->assertStatus(200)
        ->assertSee('Bloom Space')
        ->assertSee('Understand How You Learn');
});

it('shows the about section', function () {
    $this->get('/')
        ->assertSee('About Bloom Space')
        ->assertSee('independent digital platform');
});

it('shows assessment information', function () {
    $this->get('/')
        ->assertSee('Student Learning Preferences Questionnaire')
        ->assertSee('Study Consistency Assessment')
        ->assertSee('Visual')
        ->assertSee('Auditory')
        ->assertSee('Procrastination')
        ->assertSee('Self-Regulation');
});

it('shows the how it works section', function () {
    $this->get('/')
        ->assertSee('How It Works')
        ->assertSee('Register')
        ->assertSee('Take Assessment')
        ->assertSee('Get Results')
        ->assertSee('Improve');
});

it('shows the institutions section', function () {
    $this->get('/')
        ->assertSee('For Schools')
        ->assertSee('Bring Bloom Space to Your School');
});

it('shows register and login links for guests', function () {
    $this->get('/')
        ->assertSee('Log in')
        ->assertSee('Get Started');
});

it('shows dashboard link for authenticated users', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->get('/')
        ->assertSee('Dashboard')
        ->assertDontSee('Get Started');
});

it('shows the footer', function () {
    $this->get('/')
        ->assertSee('All rights reserved');
});
