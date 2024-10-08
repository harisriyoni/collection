<?php

namespace Tests\Feature;

use Tests\TestCase;

use function PHPUnit\Framework\assertEquals;

class FlatmapTest extends TestCase
{
    public function testFlatMap()
    {
        $collection = collect([
            [
                "name" => "Haris",
                "Hobi" => ["Game", "Code"],
            ],
            [
                "name" => "Dono",
                "Hobi" => ["Mancing", "Badminton"],
            ],
        ]);
        $result = $collection->flatMap(function ($item) {
            return $item["Hobi"];
        });
        assertEquals(["Game", "Code", "Mancing", "Badminton"], $result->all());
    }
}
