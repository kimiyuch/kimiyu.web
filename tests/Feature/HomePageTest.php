<?php

namespace Tests\Feature;

use Tests\TestCase;

class HomePageTest extends TestCase
{
    public function test_home_page_links_to_the_apps(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertSee('https://joey.kimiyu.ch')
            ->assertSee('https://bilby.kimiyu.ch')
            ->assertSee('https://wallaby.kimiyu.ch')
            ->assertDontSee('amor.kimiyu.ch');
    }

    public function test_pages_set_no_cookies(): void
    {
        $this->get('/')->assertCookieMissing('XSRF-TOKEN')->assertCookieMissing(config('session.cookie'));
    }

    public function test_legal_page_renders(): void
    {
        $this->get('/legal')->assertOk()->assertSee('The small print');
    }
}
