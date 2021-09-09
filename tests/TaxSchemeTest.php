<?php

namespace Tests;

use App\TaxScheme;
use PHPUnit\Framework\TestCase;

class TaxSchemeTest extends TestCase
{
    private $target;

    public function setUp()
    {
        $this->target = new TaxScheme();
    }

    public function testSalaryEqual0()
    {
        $input    = 0;
        $excepted = 0;

        $actual = $this->target->calculateTax($input);

        $this->assertEquals($excepted, $actual);
    }

    public function testSalaryLessThan0()
    {
        $input    = -10000000;
        $excepted = 0;

        $actual = $this->target->calculateTax($input);

        $this->assertEquals($excepted, $actual);
    }

    public function testAnnualTaxLessThan0()
    {
        $input    = 1;
        $excepted = 0;

        $actual = $this->target->calculateTax($input);

        $this->assertEquals($excepted, $actual);
    }

    public function testSalaryLessThan50Million()
    {
        $input    = 4000000;
        $excepted = 2400000;

        $actual = $this->target->calculateTax($input);

        $this->assertEquals($excepted, $actual);
    }

    public function testSalaryMoreThan50MillionLessThan250Million()
    {
        $input    = 10000000;
        $excepted = 13000000;

        $actual = $this->target->calculateTax($input);

        $this->assertEquals($excepted, $actual);
    }

    public function testSalaryMoreThan250MillionLessThan500Million()
    {
        $input    = 25000000;
        $excepted = 45000000;

        $actual = $this->target->calculateTax($input);

        $this->assertEquals($excepted, $actual);
    }

    public function testSalaryMoreThan500Million()
    {
        $input    = 50000000;
        $excepted = 125000000;

        $actual = $this->target->calculateTax($input);

        $this->assertEquals($excepted, $actual);
    }
}
