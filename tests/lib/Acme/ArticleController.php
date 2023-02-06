<?php

/*
 * This file is part of the ICanBoogie package.
 *
 * (c) Olivier Laviale <olivier.laviale@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

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
        private readonly ViewProvider $view_provider
    ) {
    }

    private function show(): View
    {
        $article = new Article("Article A");

        $this->response->headers->cache_control = 'public';
        $this->response->expires = '+3 hour';

        return $this->view($article);
    }
}
