<?php
// vendor/bin/pest

use Core\Container;

test('il ne peut resolve out the container', function () {
    // arange
    $container = new Container();

    $container->bind('foo', fn() => 'bar');

    // act
    $result = $container->resolve('foo');

    // assert/expect
    expect($result)->toEqual('bar');
});
