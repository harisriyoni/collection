<?php

namespace Tests\Feature;

use App\Data\Person;
use function PHPUnit\Framework\assertEquals;
use Tests\TestCase;

class CollectionTest extends TestCase
{
    public function testCreateCollection()
    {
        $collection = collect([1, 2, 3]);
        $this->assertEqualsCanonicalizing([1, 2, 3], $collection->all());
    }
    public function testForEach()
    {
        $collection = collect([1, 2, 3, 4, 5, 6, 7, 8, 9]);
        foreach ($collection as $key => $value) {
            $this->assertEquals($key + 1, $value);
        }
    }
    public function testCrud()
    {
        $collection = collect([]);
        $collection->push(1, 2, 3);
        $this->assertEqualsCanonicalizing([1, 2, 3], $collection->all());

        $result = $collection->pop();
        $this->assertEquals(3, $result);
        $this->assertEqualsCanonicalizing([1, 2], $collection->all());
    }
    public function testMap()
    {
        $collection = collect([1, 2, 3]);
        $result = $collection->map(function ($item) {
            return $item * 2;
        });
        $this->assertEqualsCanonicalizing([2, 4, 6], $result->all());
    }
    public function testMapInto()
    {
        $collection = collect(["Haris"]);
        $result = $collection->mapInto(Person::class);
        $this->assertEquals([new Person("Haris")], $result->all());
    }
    public function testMapSpread()
    {
        $collection = collect([["Haris", "Riyoni"], ["Dono", "Kasino"]]);
        $result = $collection->mapSpread(function ($firstname, $lastname) {
            $fullname = $firstname . ' ' . $lastname;
            return new Person($fullname);
        });
        $this->assertEquals([
            new Person("Haris Riyoni"),
            new Person("Dono Kasino"),
        ], $result->all());
    }
    public function testMapToGroups()
    {
        $collection = collect([
            [
                "Name" => "Haris",
                "Department" => "IT",
            ],
            [
                "Name" => "Dono",
                "Department" => "IT",
            ],
            [
                "Name" => "Kasino",
                "Department" => "HR",
            ],
            [
                "Name" => "Dono",
                "Department" => "CEO",
            ],
        ]);

        $result = $collection->mapToGroups(function ($item) {
            return [$item["Department"] => $item["Name"]];
        });
        assertEquals([
            "IT" => collect(["Haris", "Dono"]),
            "HR" => collect(["Kasino"]),
            "CEO" => collect(["Dono"]),
        ], $result->all());
    }
}
