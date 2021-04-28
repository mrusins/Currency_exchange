<?php

namespace App\Services;


use Illuminate\Support\Facades\DB;



class CalculateService
{
    private string $result='';

    public function calculateRate(string $id, float $amount): bool
    {
        if (isset($id) && $id !='') {
            $rate = DB::table('currencies')->where('ID', $id)->first();
            if($rate == null){
                $this->result = 'wrong code';
            } else {
                $this->result = ($amount * $rate->Rate)/100000;

            }

            return true;
        }
        return false;
    }
    public function getResult():string{
        return $this->result;
    }
}
