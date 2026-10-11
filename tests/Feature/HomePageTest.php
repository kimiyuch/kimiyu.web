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
}
