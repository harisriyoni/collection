<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TestingTest extends TestCase
{
   public function testTesting(){
    $collection = collect([
        "haris", "riyoni", "koko"
    ]);
    self::assertTrue($collection->contains("haris"));
    self::assertTrue($collection->contains(function ($value, $key){
        return $value == "haris";
    }));
   }
}
