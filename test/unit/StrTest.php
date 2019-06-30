<?php

namespace Zutatensuppe\Radical\Test\Unit;

use PHPUnit\Framework\TestCase;
use Zutatensuppe\Radical\Str;

class StrTest extends TestCase
{
    /**
     * @dataProvider getDeepDataProvider
     */
    public function testGetDeep($str, $suffix, $expected): void
    {
        self::assertSame($expected, Str::startsWith($str, $suffix));
    }

    public function getDeepDataProvider(): array
    {
        return [
            ['halo', 'ha', true],
            ['halo', 'halo', true],
            ['halo', ' halo', false],
        ];
    }
}
