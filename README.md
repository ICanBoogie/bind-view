# View bindings for ICanBoogie

[![Release](https://img.shields.io/packagist/v/icanboogie/bind-view.svg)](https://packagist.org/packages/icanboogie/bind-view)
[![Build Status](https://img.shields.io/travis/ICanBoogie/bind-view/master.svg)](http://travis-ci.org/ICanBoogie/bind-view)
[![HHVM](https://img.shields.io/hhvm/icanboogie/bind-view.svg)](http://hhvm.h4cc.de/package/icanboogie/bind-view)
[![Code Quality](https://img.shields.io/scrutinizer/g/ICanBoogie/bind-view/master.svg)](https://scrutinizer-ci.com/g/ICanBoogie/bind-view)
[![Code Coverage](https://img.shields.io/coveralls/ICanBoogie/bind-view/master.svg)](https://coveralls.io/r/ICanBoogie/bind-view)
[![Packagist](https://img.shields.io/packagist/dt/icanboogie/bind-view.svg)](https://packagist.org/packages/icanboogie/bind-view)

The **icanboogie/bind-view** package binds [icanboogie/view][] to [ICanBoogie][], using its
autoconfig feature. It add getters to controllers and views, making it easy to invoke views from
controller actions or obtain template engines and resolve templates from views, using features
of [icanboogie/render][].





## Views and controllers

Views are associated with controllers through the lazy getter `view`, thus a simple `$this->view`
is all that is required to enable view features inside a controller. The view then waits for
the `Controller::respond` event to perform its rendering.

The following example demonstrates how a query of some articles is set as the view content,
a title is also added to the view variables:

```php
<?php

use ICanBoogie\Routing\ActionController;

class ArticlesController extends ActionController
{
	protected function action_index()
	{
		$this->view->content = $this->model->own->visible->ordered->limit(10);
		$this->view['title'] = "Ten last articles";
	}
}
```

**Note:** The `model` getter is provided by the [icanboogie/module][] package, and is only
available if the route has a `module` property, which is automatic for routes defined by modules.

For more information continue to the [View documentation](https://github.com/ICanBoogie/View#views-and-controllers).





----------





## Requirements

The package requires PHP 5.4 or later.





## Installation

The recommended way to install this package is through [Composer](http://getcomposer.org/):

```
$ composer require icanboogie/bind-view
```





### Cloning the repository

The package is [available on GitHub](https://github.com/ICanBoogie/bind-view), its repository can be
cloned with the following command line:

	$ git clone https://github.com/ICanBoogie/bind-view.git





## Documentation

The package is documented as part of the [ICanBoogie](http://icanboogie.org/) framework
[documentation](http://icanboogie.org/docs/). You can generate the documentation for the package
and its dependencies with the `make doc` command. The documentation is generated in the `docs`
directory. [ApiGen](http://apigen.org/) is required. You can later clean the directory with
the `make clean` command.





## Testing

The test suite is ran with the `make test` command. [Composer](http://getcomposer.org/) is
automatically installed as well as all dependencies required to run the suite. You can later
clean the directory with the `make clean` command.

The package is continuously tested by [Travis CI](http://about.travis-ci.org/).

[![Build Status](https://img.shields.io/travis/ICanBoogie/bind-view/master.svg)](https://travis-ci.org/ICanBoogie/bind-view)
[![Code Coverage](https://img.shields.io/coveralls/ICanBoogie/bind-view/master.svg)](https://coveralls.io/r/ICanBoogie/bind-view)





## License

ICanBoogie/bind-view is licensed under the New BSD License - See the [LICENSE](LICENSE) file for details.





[icanboogie/module]: https://github.com/ICanBoogie/Module
[icanboogie/render]: https://github.com/ICanBoogie/Render
[icanboogie/view]: https://github.com/ICanBoogie/View
[ICanBoogie]: https://github.com/ICanBoogie/ICanBoogie
