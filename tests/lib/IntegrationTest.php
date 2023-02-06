<?php

/*
 * This file is part of the ICanBoogie package.
 *
 * (c) Olivier Laviale <olivier.laviale@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Test\ICanBoogie\Binding\View;

use ICanBoogie\HTTP\Request;
use ICanBoogie\Routing\Route;
use ICanBoogie\View\View;
use PHPUnit\Framework\TestCase;
use Test\ICanBoogie\Binding\View\Acme\Article;
use Test\ICanBoogie\Binding\View\Acme\ArticleController;

use function ICanBoogie\app;

final class IntegrationTest extends TestCase
{
    private ArticleController $controller;

    protected function setUp(): void
    {
        parent::setUp();

        $this->controller = app()->service_for_class(ArticleController::class);
    }

    public function testViewAsResponse(): void
    {
        $route = new Route('/', 'articles:show');

        $request = Request::from();
        $request->context->add($route);

        $response = $this->controller->respond($request);

        $this->assertEquals('public, max-age=10800', (string) $response->headers->cache_control);

        $body = $response->body;
        $this->assertInstanceOf(View::class, $body);
        $this->assertInstanceOf(Article::class, $body->content);
        $this->assertEquals('articles/show', $body->template);
        $this->assertEquals('default', $body->layout);
    }
}
