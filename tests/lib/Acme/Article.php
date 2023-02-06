<?php

namespace Test\ICanBoogie\Binding\View\Acme;

final class Article
{
    public function __construct(
        public readonly string $title
    ) {
    }
}
