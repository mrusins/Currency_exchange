<?php

namespace App\Services;


use App\Models\Currency;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class CalculateService
{
    private float $result=0;

    public function calculateRate(array $post, array $get): bool
    {
        if (isset($post['id']) && $post['id'] !='') {
            $rate = DB::table('currencies')->where('ID', $post['id'])->first();


            $this->result = ((float)$post['amount'] * $rate->Rate)/100000;


            return true;
        }
        return false;
    }
    public function getResult():float{
        return $this->result;
    }
}
