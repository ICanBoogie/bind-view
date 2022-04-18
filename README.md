# bind-view

[![Release](https://img.shields.io/packagist/v/icanboogie/bind-view.svg)](https://packagist.org/packages/icanboogie/bind-view)
[![Build Status](https://img.shields.io/github/workflow/status/ICanBoogie/bind-view/test)](https://github.com/ICanBoogie/bind-view/actions?query=workflow%3Atest)
[![Code Quality](https://img.shields.io/scrutinizer/g/ICanBoogie/bind-view.svg)](https://scrutinizer-ci.com/g/ICanBoogie/bind-view)
[![Code Coverage](https://img.shields.io/coveralls/ICanBoogie/bind-view.svg)](https://coveralls.io/r/ICanBoogie/bind-view)
[![Packagist](https://img.shields.io/packagist/dt/icanboogie/bind-view.svg)](https://packagist.org/packages/icanboogie/bind-view)

The **icanboogie/bind-view** package binds [icanboogie/view][] to [ICanBoogie][], using its
autoconfig feature. It add getters to controllers and views, making it easy to invoke views from
controller actions or obtain template engines and resolve templates from views, using features
of [icanboogie/render][].





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





## Installation

```bash
composer require icanboogie/bind-view
```





## Documentation

The package is documented as part of the [ICanBoogie][] framework
[documentation](https://icanboogie.org/docs/). You can generate the documentation for the package and its dependencies with the `make doc` command. The documentation is generated in the `build/docs` directory. [ApiGen](http://apigen.org/) is required. The directory can later be cleaned with the `make clean` command.





## Testing

Run `make test-container` to create and log into the test container, then run `make test` to run the
test suite. Alternatively, run `make test-coverage` to run the test suite with test coverage. Open
`build/coverage/index.html` to see the breakdown of the code coverage.





## License

**icanboogie/bind-view** is released under the [New BSD License](LICENSE).





[icanboogie/module]: https://github.com/ICanBoogie/Module
[icanboogie/render]: https://github.com/ICanBoogie/Render
[icanboogie/view]: https://github.com/ICanBoogie/View
[ICanBoogie]: https://github.com/ICanBoogie/ICanBoogie

[View]:                      https://icanboogie.org/api/view/0.10/class-ICanBoogie.View.View.html
[Renderer]:                  https://icanboogie.org/api/render/0.7/class-ICanBoogie.Render.Renderer.html
