<?php

use Illuminate\Auth\Access\AuthorizationException;
use Imanghafoori\HeyMan\Facades\HeyMan;
use Imanghafoori\HeyMan\WatchingStrategies\Views\ViewEventManager;

class MethodShouldAllowTest extends TestCase
{
    public function test_Method_Should_Allow()
    {
        \Facades\SomeClass::shouldReceive('someMethod')->once()->andReturn(false);
        HeyMan::whenYouMakeView('welcome')->thisMethodShouldAllow('SomeClass@someMethod')->otherwise()->weDenyAccess();
        app(ViewEventManager::class)->start();
        $this->expectException(AuthorizationException::class);

        view('welcome');
    }

    public function test_Closure_Should_Allow()
    {
        $cb = function () {
            return false;
        };

        HeyMan::whenYouMakeView('welcome')->thisClosureShouldAllow($cb)->otherwise()->weDenyAccess();
        app(ViewEventManager::class)->start();
        $this->expectException(AuthorizationException::class);

        view('welcome');
    }

    public function test_Value_Should_Allow()
    {
        HeyMan::whenYouMakeView('welcome')->always()->weDenyAccess();
        app(ViewEventManager::class)->start();
        $this->expectException(AuthorizationException::class);

        view('welcome');
    }
}
