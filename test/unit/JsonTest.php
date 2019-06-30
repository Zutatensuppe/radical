<?php

namespace Zutatensuppe\Radical\Test\Unit;

use PHPUnit\Framework\TestCase;
use Zutatensuppe\Radical\Json;
use Zutatensuppe\Radical\Variable;

class JsonTest extends TestCase
{
    /**
     * @dataProvider decodeProvider
     */
    public function testDecode(string $str, $expected): void
    {
        self::assertTrue(Variable::equal($expected, Json::decode($str)));
    }

    public function decodeProvider(): array
    {
        return [
            ['{"halo": "hallo"}', (object) ['halo' => 'hallo']],
            ['null', null],
            ['["halo", "hallo"]', ['halo', 'hallo']],
            ['{"halo": ["hallo"]}', (object) ['halo' => ['hallo']]],
        ];
    }

    /**
     * @dataProvider encodeProvider
     */
    public function testEncode($mixed, string $expected): void
    {
        self::assertSame($expected, Json::encode($mixed));
    }

    public function encodeProvider(): array
    {
        return [
            [(object) ['halo' => 'hallo'], '{"halo":"hallo"}'],
            [null, 'null'],
            [['halo', 'hallo'], '["halo","hallo"]'],
            [(object) ['halo' => ['hallo']], '{"halo":["hallo"]}'],
        ];
    }
}
