<?php

namespace Tests\Feature;

use Tests\TestCase;

use function PHPUnit\Framework\assertEquals;

class AgregateTest extends TestCase
{
    public function testAgregate()
    {
        $collection = collect([1,2,3,4,5,6,7,8,9]);
        $result = $collection->sum();
        assertEquals(45, $result);
        $result = $collection->avg();
        assertEquals(5, $result);
        $result = $collection->min();
        assertEquals(1, $result);
        $result = $collection->max();
        assertEquals(9, $result);
    }
    public function testReduce(){

        $collection = collect([1,2,3,4,5,6,7,8,9]);
        $result = $collection->reduce(function($carry, $item){
            return $carry + $item;

        });
        assertEquals(45, $result);
    }
}
