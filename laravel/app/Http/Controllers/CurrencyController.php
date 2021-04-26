<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Services\CalculateService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Repositories\XMLRepository;
use Illuminate\Support\Facades\DB;


class CurrencyController extends Controller
{
    private XMLRepository $xmlService;
    private CalculateService $calculateService;

    public function __construct(XMLRepository $xmlService, CalculateService $calculateService)
    {
        $this->xmlService = $xmlService;

        $this->calculateService = $calculateService;
    }

    public function index()
    {
        if(isset($_POST['refresh'])){
            $this->xmlService->importCurrencyModel();
        }

        $this->calculateService->calculateRate($_POST, $_GET);



        $id = DB::table('currencies')->get();
        $currency = strtolower($id);

        $fromDropMenu = '';
        if(isset($_POST['ID'])){
            $fromDropMenu = $_POST['ID'];
        }


        return view('index', [
            'id' => $id,
            'result' => $this->calculateService->getResult(),
            'isCalculateDone' => $this->calculateService->calculateRate($_POST, $_GET),
            'currency'=>$currency,
            'chose'=>$fromDropMenu,
            'post'=>$_POST
        ]);
    }
}
