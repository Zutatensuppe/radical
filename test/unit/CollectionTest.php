<?php

namespace Zutatensuppe\Radical\Test\Unit;

use PHPUnit\Framework\TestCase;
use Zutatensuppe\Radical\Collection;

class CollectionTest extends TestCase
{
    /**
     * @dataProvider getDeepDataProvider
     */
    public function testGetDeep($mixed, $path, $expected): void
    {
        self::assertSame($expected, Collection::getDeep($mixed, $path));
    }

    public function getDeepDataProvider(): array
    {
        return [
            [
                (object) ['hi' => ['oki' => (object)['doki' =>'as']]],
                ['hi', 'oki', 'doki'],
                'as'
            ],
            [
                (object) ['hi' => ['oki' => (object)['doki' =>'as']]],
                ['hi', 'oki', 'c'],
                null
            ],
        ];
    }
}
