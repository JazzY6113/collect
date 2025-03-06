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

    public function testValues()
    {
        $collect = new Collect\Collect(['a' => 1, 'b' => 2, 'c' => 3]);
        $values = $collect->values();
        $this->assertSame([1, 2, 3], $values->toArray());
    }

    public function testGet()
    {
        $collect = new Collect\Collect(['a' => 1, 'b' => 2, 'c' => 3]);

        // Тест для существующего ключа
        $this->assertSame(2, $collect->get('b'));

        // Тест для несуществующего ключа
        $this->assertSame(['a' => 1, 'b' => 2, 'c' => 3], $collect->get('d'));
    }

    public function testExcept()
    {
        $collect = new Collect\Collect(['a' => 1, 'b' => 2, 'c' => 3]);

        // Тест с одним исключенным элементом
        $except = $collect->except('a');
        $this->assertSame(['b' => 2, 'c' => 3], $except->toArray());

        // Тест с несколькими исключенными элементами
        $exceptMultiple = $collect->except('a', 'b');
        $this->assertSame(['c' => 3], $exceptMultiple->toArray());

        // Тест с исключением нескольких элементов в виде массива
        $exceptArray = $collect->except(['a', 'c']);
        $this->assertSame(['b' => 2], $exceptArray->toArray());
    }
}