
## Installation guide:
<pre>
git clone
cd project-folder
composer install
composer dump-autoload
</pre>

## Running The App
<pre>
cd project-folder
php src/cli.php
</pre>

## Project Explanation
<pre>
After running the app you should choose between 1. taxation scheme and or 2. taxation reliefs

if you choose 1. taxation scheme, input the monthly salary then enter, after that the result will appear
Taxation scheme According to Indonesia’s Government rule about income taxation, personal income tax
follows the below scheme:
- Annual income from 0 to 50.000.000 IDR - tax rate is 5%
- Annual income from 50.000.000 to 250.000.000 IDR - tax rate is 15%
- Annual income from 250.000.000 to 500.000.000 IDR - tax rate is 25%
- Annual income above 500.000.000 IDR - tax rate is 30%
Example: If a person monthly salary is 25.000.000, then the calculation will be :
Annual taxable income = 25.000.000 * 12 = 300.000.000
Annual Tax on this Income = (50.000.000 * 5%) + (200.000.000 * 15%) +
(50.000.000 * 25%) = 45.000.000

And if you choose the 2. taxation reliefs
you have to choose
Tax reliefs are based on the person’s profile :
- TK0 - Single : 54.000.000 IDR                    = 0
- K0 - Married with no dependant : 58.500.000 IDR  = 1
- K1 - Married with 1 dependant : 63.000.000 IDR   = 2  
- K2 - Married with 2 dependants : 67.500.000 IDR  = 3
- K3 - Married with 3 dependants : 72.000.000 IDRe = 4

after that input your monthly salary, after that the result displayed 

</pre>

## Running test
<pre>
cd project-folder
vendor/bin/phpunit
</pre>
