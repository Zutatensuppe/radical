<?php

namespace zutatensuppe\radical\test\unit;

use PHPUnit\Framework\TestCase;
use zutatensuppe\radical\var_;

class VarTest extends TestCase
{
    /**
     * @dataProvider equalDataProvider
     */
    public function testEqual($a, $b, bool $expected): void
    {
        self::assertSame($expected, var_\equal($a, $b));
    }

    public function equalDataProvider(): array
    {
        return [
            [
                (object) ['hi' => ['oki' => (object)['doki' =>'as']]],
                (object) ['hi' => ['oki' => (object)['doki' =>'as']]],
                true
            ],
            [
                (object) ['hi' => ['oki' => (object)['doki' =>'as']]],
                ['hi', 'oki', 'c'],
                false
            ],
            [
                (object) ['hi' => new \DateTime('2019-01-01')],
                (object) ['hi' => new \DateTime('2019-01-01')],
                true
            ],
            [
                ['hi' => new \DateTime('2019-01-01')],
                ['hi' => new \DateTime('2019-01-01')],
                true
            ],
            [
                1,
                '1',
                false
            ],
        ];
    }
}
