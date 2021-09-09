<?php

namespace App;

use App\Config;

class TaxScheme
{
    protected $config;

    public function __construct()
    {
        $this->config = new Config;
    }

    public function calculateTax(int $salary): int
    {
        if ($salary <= 0) {
            return 0;
        }

        $annualSalary = $salary * 12;
        $annualTax    = 0;
        $scheme       = $this->config->scheme;

        $key = $this->salaryCheck($annualSalary, $scheme);

        if ($key == 0) {
            $annualTax = $annualSalary * $scheme[$key]['percentage'];

            return $annualTax;
        }

        $reduction = 0;

        for ($i = 0; $i <= $key; $i++) {
            $reduction += $scheme[$i]['reduction'];

            if ($i == $key) {
                $annualTax += ($annualSalary - $reduction) * $scheme[$i]['percentage'];
            } else {
                $annualTax += $scheme[$i+1]['reduction'] * $scheme[$i]['percentage'];
            }
        }

        if ($annualTax <= 0) {
            return 0;
        }

        return $annualTax;
    }

    private function salaryCheck(int $salary, array $scheme)
    {
        for ($i = 0; $i < count($scheme); $i++) {
            if ($scheme[$i]['condition'] === '<') {
                if ($salary < intval($scheme[$i]['annual_salary'])) {
                    return $i;
                }
            } elseif ($scheme[$i]['condition'] === '>=') {
                if ($salary >= intval($scheme[$i]['annual_salary'])) {
                    return $i;
                }
            }
        }
    }
}
