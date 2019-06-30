<?php

namespace zutatensuppe\radical\test\unit;

use PHPUnit\Framework\TestCase;
use zutatensuppe\radical\collection_;

class CollectionTest extends TestCase
{
    /**
     * @dataProvider getDeepDataProvider
     */
    public function testGetDeep($mixed, $path, $expected): void
    {
        self::assertSame($expected, collection_\get_deep($mixed, $path));
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
