<?php

namespace Tests\Feature;

use Tests\TestCase;

class RandomTest extends TestCase
{
    public function testRandom()
    {
        $collection = collect([1, 2, 3, 4, 5, 6, 7, 8, 9]);
        $result = $collection->random();
        self::assertTrue(in_array($result, [1, 2, 3, 4, 5, 6, 7, 8, 9]));
        // $result = $collection->random(5);
        // $this->assertEqualsCanonicalizing([1,2,3,4,5], $result);
    }
}
