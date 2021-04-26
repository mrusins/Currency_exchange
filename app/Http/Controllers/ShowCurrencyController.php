<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Services\ShowCurrencyRequest;
use App\Services\ShowCurrencyService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Services\XMLService;
use Illuminate\Support\Facades\DB;

class ShowCurrencyController extends Controller
{


    private ShowCurrencyService $showCurrencyService;

    public function __construct(ShowCurrencyService $showCurrencyService)
    {


        $this->showCurrencyService = $showCurrencyService;
    }

    public function show(string $symbol)
    {

        $currency = $this->showCurrencyService->execute(new ShowCurrencyRequest($symbol));
        return $currency;
    }
}
