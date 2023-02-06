<?php

/*
 * This file is part of the ICanBoogie package.
 *
 * (c) Olivier Laviale <olivier.laviale@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ICanBoogie\Binding\View;

use ICanBoogie\HTTP\Request;
use ICanBoogie\PropertyNotDefined;
use ICanBoogie\Routing\ControllerAbstract;
use ICanBoogie\View\ControllerBindings;
use ICanBoogie\View\View;
use LogicException;
use PHPUnit\Framework\TestCase;

class HooksTest extends TestCase
{
    /**
     * @var ControllerAbstract&ControllerBindings;
     */
    private ControllerAbstract $controller;

    protected function setUp(): void
    {
        parent::setUp();

        $this->controller = new class () extends ControllerAbstract {
            use ControllerBindings;

            protected function action(Request $request): mixed
            {
                throw new LogicException();
            }
        };
    }

    public function test_controller_get_view(): void
    {
        $view = $this->controller->view;
        $this->assertInstanceOf(View::class, $view);
        $this->assertSame($view, $this->controller->view);
    }

    public function test_controller_get_template(): void
    {
        $this->expectException(PropertyNotDefined::class);
        $this->assertNull($this->controller->template);
    }

    public function test_controller_get_layout(): void
    {
        $this->expectException(PropertyNotDefined::class);
        $this->assertNull($this->controller->layout);
    }
}
