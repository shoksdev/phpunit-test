<?php

use PHPUnit\Framework\TestCase;
use Collect\Collect;

class CollectTest extends TestCase
{
    protected $testArray = ['a' => 1, 'b' => 2, 'c' => 3];
    protected $collection;

    protected function setUp(): void
    {
        $this->collection = new Collect($this->testArray);
    }

    public function testKeys(): void
    {
        $this->assertEquals(['a', 'b', 'c'], $this->collection->keys()->toArray());
    }

    public function testValues(): void
    {
        $this->assertEquals([1, 2, 3], $this->collection->values()->toArray());
    }

    public function testGet(): void
    {
        $this->assertEquals(2, $this->collection->get('b'));
        $this->assertEquals($this->testArray, $this->collection->get());
    }

    public function testExcept(): void
    {
        $this->assertEquals(['b' => 2], $this->collection->except('a', 'c')->toArray());
    }

    public function testOnly(): void
    {
        $this->assertEquals(['a' => 1, 'c' => 3], $this->collection->only('a', 'c')->toArray());
    }

    public function testFirst(): void
    {
        $this->assertEquals(1, $this->collection->first());
    }

    public function testCount(): void
    {
        $this->assertEquals(3, $this->collection->count());
    }

    public function testToArray(): void
    {
        $this->assertEquals($this->testArray, $this->collection->toArray());
    }

    public function testPush(): void
    {
        $this->assertEquals(['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4], $this->collection->push(4, 'd')->toArray());
    }

    public function testUnshift(): void
    {
        $this->assertEquals([0, 'a' => 1, 'b' => 2, 'c' => 3], $this->collection->unshift(0)->toArray());
    }

    public function testShift(): void
    {
        $this->assertEquals(['b' => 2, 'c' => 3], $this->collection->shift()->toArray());
    }

    public function testPop(): void
    {
        $this->assertEquals(['a' => 1, 'b' => 2], $this->collection->pop()->toArray());
    }

    public function testSplice(): void
    {
        $this->assertEquals(['b' => 2, 'c' => 3], $this->collection->splice($this->testArray, 1, 1)->toArray());
    }

}
