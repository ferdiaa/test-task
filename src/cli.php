<?php

require __DIR__.'/../vendor/autoload.php';

use App\TaxScheme;
use App\TaxRelief;

function mainProgram()
{
    print("====================================\n");
    print("Online Pajak Test\n");
    print("====================================\n");
    print("[1] Taxation scheme\n");
    print("[2] Taxation reliefs\n");
    print("Pilih program [1/2]: ");

    $program = trim(fgets(STDIN));

    print("====================================\n");

    if ($program == 1) {
        print("Masukkan gaji per bulan: ");

        $salary = trim(fgets(STDIN));

        $taxScheme = new TaxScheme();
        $tax = $taxScheme->calculateTax(intval($salary));

        die("Pajak tahunan: ".$tax."\n");
    } elseif ($program == 2) {
        print("Pilih status:\n");
        print("[0] Belum menikah\n");
        print("[1] Menikah, 0 anak\n");
        print("[2] Menikah, 1 anak\n");
        print("[3] Menikah, 2 anak\n");
        print("[4] Menikah, 3 anak\n");
        print("Masukkan status [0/1/2/3/4]: ");

        $selection = trim(fgets(STDIN));
        print("====================================\n");

        switch ($selection) {
            case '0':
                $type = 'TK0';
                $message = "Status: Belum Menikah";
                break;

            case '1':
                $type = 'K0';
                $message = "Status: Menikah, 0 anak";
                break;

            case '2':
                $type = 'K1';
                $message = "Status: Menikah, 1 anak";
                break;

            case '3':
                $type = 'K2';
                $message = "Status: Menikah, 2 anak";
                break;

            case '4':
                $type = 'K3';
                $message = "Status: Menikah, 3 anak";
                break;

            default:
                $type = 'K0';
                $message = "Input salah, diasumsikan\nStatus: Belum Menikah";
                break;
        }

        print($message."\n");
        print("Masukkan gaji per bulan: ");
        $salary = trim(fgets(STDIN));

        $taxRelief = new TaxRelief();
        $tax = $taxRelief->calculateTaxWithRelief($type, intval($salary));

        die("Pajak tahunan: ".$tax."\n");
    } else {
        mainProgram();
    }
}

mainProgram();