<?php

namespace App\Services;

use App\Models\Currency;

class ShowCurrencyService{


    public function execute(ShowCurrencyRequest $request):string{
        return Currency::find($request->symbol());
    }
}
