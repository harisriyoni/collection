<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertEquals;

class FilterTest extends TestCase
{
  public function testFilter(){
    $collection = collect([
        "haris" => "100",
        "dono" => "20",
        "dini" => "110",
    ]);
    $result = $collection->filter(function($value, $key){
        return $value >=90;
    });
    assertEquals([
        "haris"=>"100",
        "dini"=>"110",
    ], $result->all());
  }
}
