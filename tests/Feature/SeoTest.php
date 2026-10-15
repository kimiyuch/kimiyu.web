<?php

namespace Tests\Feature;

use Tests\TestCase;

class SeoTest extends TestCase
{
    public function test_each_page_has_its_own_canonical_url_and_share_image(): void
    {
        config(['app.url' => 'https://kimiyu.ch']);

        $this->get('/')
            ->assertSee('<link rel="canonical" href="https://kimiyu.ch/">', escape: false)
            ->assertSee('<meta property="og:url" content="https://kimiyu.ch/">', escape: false)
            ->assertSee('images/og.png')
            ->assertSee('summary_large_image');

        $this->get('/legal')
            ->assertSee('<link rel="canonical" href="https://kimiyu.ch/legal">', escape: false)
            ->assertSee('<title>Legal notice · kimiyu studio</title>', escape: false)
            ->assertSee('Privacy and contact details for kimiyu.ch');
    }

    public function test_home_page_describes_the_studio_as_structured_data(): void
    {
        $html = $this->get('/')->getContent();

        preg_match('#<script type="application/ld\+json">(.*?)</script>#s', $html, $match);
        $data = json_decode($match[1] ?? '', true);

        $this->assertSame('https://schema.org', $data['@context']);
        $this->assertSame('kimiyu studio', $data['name']);
        $this->assertSame(['Joey', 'Bilby', 'Wallaby', 'Wombat'], array_column($data['owns'], 'name'));
    }
}
