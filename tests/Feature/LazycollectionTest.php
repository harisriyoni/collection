<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\LazyCollection;
use Tests\TestCase;

class LazycollectionTest extends TestCase
{
   public function testLazycoll(){
    $collection = LazyCollection::make(function(){
        $value = 0;
        while(true){
            yield $value;
            $value++;
        }
    });
    $result = $collection->take(10);
    $this->assertEqualsCanonicalizing([0,1,2,3,4,5,6,7,8,9], $result->all());
   }
}
