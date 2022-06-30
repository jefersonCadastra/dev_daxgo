<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use Faker\Generator as Faker;

class WizardCadastroControler extends Controller
{
    const LENGTH = 64;
    const KEYSPACE = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    public function index(Faker $faker)
    {
        $cliente = new Cliente();
        $cliente->nome = $faker->name();
        $cliente->email = $faker->email();
        $cliente->account_ga = $this->random_str(30, '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ');

        $cliente->save();

        return view('wizard');
    }

    public function random_str(int $length = self::LENGTH, string $keyspace = self::KEYSPACE): string
    {
        if ($length < 1)
            throw new \RangeException("Length must be a positive integer");

        $pieces = [];
        $max = mb_strlen($keyspace, '8bit') - 1;

        for ($i = 0; $i < $length; ++$i) {
            $pieces[] = $keyspace[random_int(0, $max)];
        }

        return implode('', $pieces);
    }
}
