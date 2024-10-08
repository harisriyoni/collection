<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertEquals;

class ZippingTest extends TestCase
{
    public function testZip()
    {
        $collection1 = collect([1,2,3]);
        $collection2 = collect([4,5,6]);
        $collection3 = $collection2->zip($collection1);
        $this->assertEquals([
            collect([4,1]),
            collect([5,2]),
            collect([6,3])
        ], $collection3->all());
    }

    public function testJoin(){
        $collection = collect(["Haris", "dono", "dini", "dana"]);
        assertEquals("Haris-dono-dini-dana", $collection->join("-"));
        assertEquals("Haris-dono-dini_dana", $collection->join("-", "_"));
        assertEquals("Haris dono dini yoi gasih dana", $collection->join(" ", " yoi gasih "));
    }
}
