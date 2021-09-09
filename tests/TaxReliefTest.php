<?php

namespace Tests;

use App\TaxRelief;
use PHPUnit\Framework\TestCase;

class TaxReliefTest extends TestCase
{
    private $target;

    public function setUp()
    {
        $this->target = new TaxRelief();
    }

    public function testSalaryEqual0()
    {
        $type     = 'TK0';
        $salary   = 0;
        $excepted = 0;

        $actual = $this->target->calculateTaxWithRelief($type, $salary);

        $this->assertEquals($excepted, $actual);
    }

    public function testSalaryLessThan0()
    {
        $type     = 'TK0';
        $salary   = -10000000;
        $excepted = 0;

        $actual = $this->target->calculateTaxWithRelief($type, $salary);

        $this->assertEquals($excepted, $actual);
    }

    public function testAnnualTaxLessThan0()
    {
        $type     = 'TK0';
        $salary   = 1;
        $excepted = 0;

        $actual = $this->target->calculateTaxWithRelief($type, $salary);

        $this->assertEquals($excepted, $actual);
    }

    public function testInvalidType()
    {
        $type     = '';
        $salary   = 25000000;
        $excepted = 0;

        $actual = $this->target->calculateTaxWithRelief($type, $salary);

        $this->assertEquals($excepted, $actual);
    }

    public function testSingle()
    {
        $type     = 'TK0';
        $salary   = 25000000;
        $excepted = 31900000;

        $actual = $this->target->calculateTaxWithRelief($type, $salary);

        $this->assertEquals($excepted, $actual);
    }

    public function testMarriedWith0Dependant()
    {
        $type     = 'K0';
        $salary   = 25000000;
        $excepted = 31225000;

        $actual = $this->target->calculateTaxWithRelief($type, $salary);

        $this->assertEquals($excepted, $actual);
    }

    public function testMarriedWith1Dependant()
    {
        $type     = 'K1';
        $salary   = 6500000;
        $excepted = 750000;

        $actual = $this->target->calculateTaxWithRelief($type, $salary);

        $this->assertEquals($excepted, $actual);
    }

    public function testMarriedWith2Dependant()
    {
        $type     = 'K2';
        $salary   = 25000000;
        $excepted = 29875000;

        $actual = $this->target->calculateTaxWithRelief($type, $salary);

        $this->assertEquals($excepted, $actual);
    }

    public function testMarriedWith3Dependant()
    {
        $type     = 'K3';
        $salary   = 25000000;
        $excepted = 29200000;

        $actual = $this->target->calculateTaxWithRelief($type, $salary);

        $this->assertEquals($excepted, $actual);
    }
}
