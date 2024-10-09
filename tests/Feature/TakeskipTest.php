<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Assert;
use LDAP\Result;
use Tests\TestCase;

use function PHPUnit\Framework\Assert\assertEqualsCanonicalizing;

class TakeskipTest extends TestCase
{
   public function testTake(){
    $collect = collect([1,2,3,4,5,6,7,8,9]);
    $result = $collect->take(3)->values(); //ambil 3 data pertama
    $this->assertEqualsCanonicalizing([1,2,3], $result->all());
    // $result = $collect->take(-3)->values(); //ambil 3 data dari belakang
    // Assert::assertEqualsCanonicalizing([9,8,7], $result->all());
    $result = $collect->takeUntil(function ($value) {
        return $value == 3; // 1 false 2 false 3 true
    }); //ambil data sampai kondisi true
    Assert::assertEqualsCanonicalizing([1,2], $result->all());

    $result = $collect->takeWhile(function ($value) {
        return $value < 3; // 1 true 2 true 3 false
    }); //ambil data selama kondisi true
    Assert::assertEqualsCanonicalizing([1,2], $result->all());
}
}
