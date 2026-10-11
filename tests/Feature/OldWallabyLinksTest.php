<?php

namespace Tests\Feature;

use Tests\TestCase;

class OldWallabyLinksTest extends TestCase
{
    public function test_old_wallaby_links_redirect_to_wallaby(): void
    {
        $this->get('/login')->assertStatus(301)->assertRedirect('https://wallaby.kimiyu.ch/login');

        $this->get('/reset-password/abc123?email=a%40b.ch')
            ->assertStatus(301)
            ->assertRedirect('https://wallaby.kimiyu.ch/reset-password/abc123?email=a%40b.ch');

        $this->get('/verify-email/1/hash?expires=1&signature=x')
            ->assertRedirect('https://wallaby.kimiyu.ch/verify-email/1/hash?expires=1&signature=x');
    }
}
