<?php

namespace Zutatensuppe\Radical\Test\Unit;

use PHPUnit\Framework\TestCase;
use Zutatensuppe\Radical\Variable;

class VariableTest extends TestCase
{
    /**
     * @dataProvider equalDataProvider
     */
    public function testEqual($a, $b, bool $expected): void
    {
        self::assertSame($expected, Variable::equal($a, $b));
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
