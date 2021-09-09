<?php

namespace App;

use App\TaxScheme;
use App\Config;

class TaxRelief extends TaxScheme
{
    public function calculateTaxWithRelief(string $type, int $salary): int
    {
        if ($salary <= 0) {
            return 0;
        }

        $annualSalary  = $salary * 12;
        $key           = array_search($type, array_column($this->config->relief, 'type'));

        if ($key === false) {
            return 0;
        }

        $reduction     = $this->config->relief[$key]['reduction'];
        $taxableIncome = ($annualSalary - $reduction) / 12;
        $annualTax     = $this->calculateTax($taxableIncome);

        if ($annualTax <= 0) {
            return 0;
        }

        return $annualTax;
    }
}
