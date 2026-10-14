# bind-view

[![Release](https://img.shields.io/packagist/v/icanboogie/bind-view.svg)](https://packagist.org/packages/icanboogie/bind-view)
[![Downloads](https://img.shields.io/packagist/dt/icanboogie/bind-view.svg)](https://packagist.org/packages/icanboogie/bind-view)

The **icanboogie/bind-view** package binds [icanboogie/view][] to [ICanBoogie][], using its
autoconfig feature. It adds getters to controllers and views, making it easy to invoke views from
controller actions or get template engines and resolve templates from views, using features
of [icanboogie/render][].



#### Installation

```shell
composer require icanboogie/bind-view
```



## Views and controllers

Views are associated with controllers through the lazy getter `view`, thus a simple `$this->view`
is all that is required to enable view features inside a controller. The view then waits for
the `Controller::action` event to perform its rendering.

The [View][] instance is created with the controller and the [Renderer][] instance obtained from the
container.

The following example demonstrates how a query of some articles is set as the view content,
a title is also added to the view variables:

```php
<?php

use ICanBoogie\Routing\Controller;

class ArticlesController extends Controller
{
    use Controller\ResourceTrait;

    protected function index()
    {
        $this->view->content = $this->model->own->visible->ordered->limit(10);
        $this->view['title'] = "Ten last articles";
    }
}
```

> **Note:** The `model` getter is provided by the [icanboogie/module][] package, and is only
available if the route has a `module` property, which is automatic for routes defined by modules.

For more information continue to the [View documentation](https://github.com/ICanBoogie/View#views-and-controllers).





----------



## Continuous Integration

The project is continuously tested by [GitHub actions](https://github.com/ICanBoogie/bind-view/actions).

[![Tests](https://github.com/ICanBoogie/bind-view/actions/workflows/test.yml/badge.svg?branch=7.0)](https://github.com/ICanBoogie/bind-view/actions/workflows/test.yml)
[![Static Analysis](https://github.com/ICanBoogie/bind-view/actions/workflows/static-analysis.yml/badge.svg?branch=7.0)](https://github.com/ICanBoogie/bind-view/actions/workflows/static-analysis.yml)
[![Code Style](https://github.com/ICanBoogie/bind-view/actions/workflows/code-style.yml/badge.svg?branch=7.0)](https://github.com/ICanBoogie/bind-view/actions/workflows/code-style.yml)



## Code of Conduct

This project adheres to a [Contributor Code of Conduct](CODE_OF_CONDUCT.md). By participating in
this project and its community, you're expected to uphold this code.



## Contributing

See [CONTRIBUTING](CONTRIBUTING.md) for details.



[icanboogie/module]: https://github.com/ICanBoogie/Module
[icanboogie/render]: https://github.com/ICanBoogie/Render
[icanboogie/view]: https://github.com/ICanBoogie/View
[ICanBoogie]: https://github.com/ICanBoogie/ICanBoogie

[View]:                      https://icanboogie.org/api/view/0.10/class-ICanBoogie.View.View.html
[Renderer]:                  https://icanboogie.org/api/render/0.7/class-ICanBoogie.Render.Renderer.html
