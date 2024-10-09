<?php

namespace Tests\Feature;

use function PHPUnit\Framework\assertEquals;
use Tests\TestCase;

class GroupbyTest extends TestCase
{
    public function testGroupby()
    {
        $collection = collect([
            [
                "Nama" => "Haris",
                "Departemen" => "IT",
            ],
            [
                "Nama" => "Dono",
                "Departemen" => "IT",
            ],
            [
                "Nama" => "Dini",
                "Departemen" => "HR",
            ],
        ]);
        $result = $collection->groupBy("Departemen");
        assertEquals([
            "IT" => [
                [
                    "Nama" => "Haris",
                    "Departemen" => "IT",
                ],
                [
                    "Nama" => "Dono",
                    "Departemen" => "IT",
                ],
            ],
            "HR" => [
                [
                    "Nama" => "Dini",
                    "Departemen" => "HR",
                ],
            ]
        ], $result->toArray());
    }
}
