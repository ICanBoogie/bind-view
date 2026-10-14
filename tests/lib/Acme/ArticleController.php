<?php

namespace Test\ICanBoogie\Binding\View\Acme;

use ICanBoogie\Routing\Controller\ActionTrait;
use ICanBoogie\Routing\ControllerAbstract;
use ICanBoogie\View\View;
use ICanBoogie\View\ViewProvider;
use ICanBoogie\View\ViewTrait;

final class ArticleController extends ControllerAbstract
{
    /**
     * @uses show
     */
    use ActionTrait;
    use ViewTrait;

    public function __construct(
        // @phpstan-ignore property.onlyWritten (read by ViewTrait)
        private readonly ViewProvider $view_provider
    ) {
    }

    // @phpstan-ignore method.unused (called by ActionTrait)
    private function show(): View
    {
        $article = new Article("Article A");

        $this->response->headers->cache_control = 'public';
        $this->response->expires = '+3 hour';

        return $this->view($article);
    }
}
