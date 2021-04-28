<?php

namespace App\Services;


use App\Models\Currency;


class SearchService
{

    public function search(string $id)
    {
        return Currency::where('ID', $id)->firstOrFail();


    }
}
