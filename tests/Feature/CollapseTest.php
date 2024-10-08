<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertEquals;

class CollapseTest extends TestCase
{
  public function testCollapse(){
    $collection = collect([
        [1,2,3],
        [4,5,6],
        [7,8,9],
    ]);
    $result = $collection->collapse();
    assertEquals([1,2,3,4,5,6,7,8,9], $result->all());
  }
}
