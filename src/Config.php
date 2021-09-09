<?php

namespace App;

Class Config
{
    public $scheme = [
        ['condition' => '<', 'annual_salary' => 50000000, 'reduction' => 0, 'percentage' => 5 /100],
        ['condition' => '<', 'annual_salary' => 250000000, 'reduction' => 50000000, 'percentage' => 15 /100],
        ['condition' => '<', 'annual_salary' => 500000000, 'reduction' => 200000000, 'percentage' => 25 /100],
        ['condition' => '>=', 'annual_salary' => 500000000, 'reduction' => 250000000, 'percentage' => 30 /100]
    ];

    public $relief = [
        ['type' => 'TK0', 'reduction' => 54000000],
        ['type' => 'K0', 'reduction' => 58500000],
        ['type' => 'K1', 'reduction' => 63000000],
        ['type' => 'K2', 'reduction' => 67500000],
        ['type' => 'K3', 'reduction' => 72000000]
    ];
}
