<?php

namespace Tests\Feature;

use PHPUnit\Framework\Assert;
use Tests\TestCase;

class SlicingTest extends TestCase
{
    public function testSlicing()
    {
        $collection = collect([
            1, 2, 3, 4, 5, 6, 7, 8, 9,
        ]);
        $result = $collection->slice(3)->values();
        Assert::assertEqualsCanonicalizing([4, 5, 6, 7, 8, 9,], $result->all());
        $result = $collection->slice(3, 2)->values();
        Assert::assertEqualsCanonicalizing([ 4, 5], $result->all());
    }
}
