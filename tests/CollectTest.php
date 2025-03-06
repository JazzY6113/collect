<?php

use PHPUnit\Framework\TestCase;

class CollectTest extends TestCase
{
    public function testKeys()
    {
        $collect = new Collect\Collect(['a' => 1, 'b' => 2, 'c' => 3]);
        $keys = $collect->keys();
        $this->assertSame(['a', 'b', 'c'], $keys->toArray());
    }


}