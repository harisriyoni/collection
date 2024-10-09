<?php

namespace Tests\Feature;

use Illuminate\Testing\Assert;
use Tests\TestCase;

class RetrieveTest extends TestCase
{
    public function testFirst()
    {
        $collection = collect([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]);
        $result = $collection->first();
        Assert::assertEquals(1, $result);

        $result = $collection->first(function ($value, $key) {
            return $value > 5;
        });
        $this->assertEquals(6, $result);

        $result = $collection->last();
        $this->assertEquals(10, $result);
        $result = $collection->last(function ($value, $item){
            return $value < 8;
        });
        $this->assertEquals(7, $result);

    }
}
