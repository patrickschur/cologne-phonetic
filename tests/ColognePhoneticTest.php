<?php

declare(strict_types = 1);

namespace ColognePhonetic\Tests;

use ColognePhonetic\ColognePhonetic;
use PHPUnit\Framework\TestCase;

/**
 * Class ColognePhoneticTest
 *
 * @author Patrick Schur <patrick_schur@outlook.de>
 * @package ColognePhonetic\Tests
 */
class ColognePhoneticTest extends TestCase
{
    /**
     * @param string $expected
     * @param string $word
     * @dataProvider wordsProvider
     */
    public function testWords($expected, $word)
    {
        $c = new ColognePhonetic();

        $this->assertEquals($expected, $c->convert($word));
    }

    /**
     * @param string $char
     * @param string $expected
     * @dataProvider charProvider
     */
    public function testChars($char, $expected)
    {
        $c = new ColognePhonetic();

        $this->assertEquals($expected, $c->convert($char));
    }

    public function testIsNull()
    {
        $c = new ColognePhonetic();

        $this->assertNull($c->convert(''));
    }

    /**
     * @param string $word
     * @param string $expected
     * @dataProvider cProvider
     */
    public function testC($word, $expected)
    {
        $c = new ColognePhonetic();

        $this->assertEquals($expected, $c->convert($word));
    }

    /**
     * @param $word
     * @param $expected
     * @dataProvider dProvider
     */
    public function testD($word, $expected)
    {
        $c = new ColognePhonetic();

        $this->assertEquals($expected, $c->convert($word));
    }

    /**
     * @param $word
     * @param $expected
     * @dataProvider tProvider
     */
    public function testT($word, $expected)
    {
        $c = new ColognePhonetic();

        $this->assertEquals($expected, $c->convert($word));
    }

    /**
     * @param string $word
     * @param string $expected
     * @dataProvider pProvider
     */
    public function testP($word, $expected)
    {
        $c = new ColognePhonetic();

        $this->assertEquals($expected, $c->convert($word));
    }

    /**
     * @param string $word
     * @param string $expected
     * @dataProvider xProvider
     */
    public function testX($word, $expected)
    {
        $c = new ColognePhonetic();

        $this->assertEquals($expected, $c->convert($word));
    }

    /**
     * @return array
     */
    public function wordsProvider()
    {
        return [
            ['17863', 'Breschnew'],
            ['65752682', 'Müller-Lüdenscheidt'],
            ['3412', 'Wikipedia'],
        ];
    }

    /**
     * @return array
     */
    public function charProvider()
    {
        return [
            ['A', '0'],
            ['B', '1'],
            ['C', '4'],
            ['D', '2'],
            ['E', '0'],
            ['F', '3'],
            ['G', '4'],
            ['H', ''],
            ['I', '0'],
            ['J', '0'],
            ['K', '4'],
            ['L', '5'],
            ['M', '6'],
            ['N', '6'],
            ['O', '0'],
            ['P', '1'],
            ['Q', '4'],
            ['R', '7'],
            ['S', '8'],
            ['T', '2'],
            ['U', '0'],
            ['V', '3'],
            ['W', '3'],
            ['X', '48'],
            ['Y', '0'],
            ['Z', '8'],
        ];
    }

    /**
     * @return array
     */
    public function cProvider()
    {
        return [
            ['CA', '4'],
            ['CC', '8'],
            ['CL', '45'],
            ['CR', '47'],
            ['CX', '48'],
            ['CB', '81'],
            ['CD', '82'],
            ['CF', '83'],
            ['CG', '84'],
            ['CM', '86'],
            ['PCA', '14'],
            ['PCC', '18'],
            ['PCX', '148'],
            ['PCP', '181'],
            ['PCD', '182'],
            ['PCF', '183'],
            ['PCG', '184'],
            ['PCL', '185'],
            ['PCM', '186'],
            ['PCR', '187'],
        ];
    }

    /**
     * @return array
     */
    public function dProvider()
    {
        return [
            ['DA', '2'],
            ['DC', '8'],
            ['DB', '21'],
            ['DF', '23'],
            ['DG', '24'],
            ['DL', '25'],
            ['DM', '26'],
            ['DR', '27'],
            ['DX', '248'],
        ];
    }

    /**
     * @return array
     */
    public function tProvider()
    {
        return [
            ['TA', '2'],
            ['TC', '8'],
            ['TB', '21'],
            ['TF', '23'],
            ['TG', '24'],
            ['TL', '25'],
            ['TM', '26'],
            ['TR', '27'],
            ['TX', '248'],
        ];
    }

    /**
     * @return array
     */
    public function pProvider()
    {
        return [
            ['PA', '1'],
            ['PH', '3'],
            ['PD', '12'],
            ['PF', '13'],
            ['PG', '14'],
            ['PL', '15'],
            ['PM', '16'],
            ['PR', '17'],
            ['PC', '18'],
            ['PX', '148'],
        ];
    }

    /**
     * @return array
     */
    public function xProvider()
    {
        return [
            ['AX', '48'],
            ['IX', '048'],
            ['BX', '148'],
            ['DX', '248'],
            ['FX', '348'],
            ['LX', '548'],
            ['MX', '648'],
            ['RX', '748'],
            ['SX', '848'],
            ['XX', '4848'],
        ];
    }
}