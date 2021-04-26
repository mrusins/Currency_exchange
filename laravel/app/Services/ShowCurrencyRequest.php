<?php

namespace App\Services;

class ShowCurrencyRequest{

    private string $symbol;

    public function __construct(string $symbol){

        $this->symbol = $symbol;
    }
    public function symbol():string{
        return $this->symbol;
    }
}
