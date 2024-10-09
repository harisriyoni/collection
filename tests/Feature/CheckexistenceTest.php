<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CheckexistenceTest extends TestCase
{
    public function testExistence(){
        $collection = collect([1,2,3,4,5,6,7,8,9]);
        self::assertTrue($collection->isNotEmpty());
        self::assertFalse($collection->isEmpty());
        self::assertTrue($collection->contains(8)); // disini akan mengecek angka 8 ada atau  tidak dan ada , dan disini pake true
        self::assertFalse($collection->contains(10));  // disini akan mengecek apakah data 10 itu ada atau tidak disini tidak ada berarti false
        self::assertTrue($collection->contains(function ($value, $key){
            return $value == 8;
            }));
    }
}
