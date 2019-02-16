<?php

namespace RenatoMarinho\LaravelPageSpeed\Test\Middleware;

use RenatoMarinho\LaravelPageSpeed\Middleware\TrimUrls;
use RenatoMarinho\LaravelPageSpeed\Test\TestCase;

class TrimUrlsTest extends TestCase
{
    protected function getMiddleware()
    {
        $this->middleware = new TrimUrls();
    }

    public function testTrimUrls()
    {
        $response = $this->middleware->handle($this->request, $this->getNext());

        $this->assertNotContains('href=https://', $response->getContent());
        $this->assertNotContains('href=http://', $response->getContent());
        $this->assertNotContains('src=https://', $response->getContent());
        $this->assertNotContains('src=http://', $response->getContent());
        $this->assertContains('placeholder="https://example.com/"', $response->getContent());
        $this->assertContains('//code.jquery.com/jquery-3.2.1.min.js', $response->getContent());
    }
}
