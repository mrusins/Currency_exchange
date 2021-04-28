<?php

namespace App\Http\Controllers;

use App\Services\CalculateService;
use App\Services\SearchService;
use App\Repositories\XMLRepository;
use Illuminate\Support\Facades\DB;


class CurrencyController extends Controller
{
    private XMLRepository $xmlService;
    private CalculateService $calculateService;
    private SearchService $searchService;
    private string $id = '';
    private float $amount = 0;


    public function __construct(XMLRepository $xmlService, CalculateService $calculateService, SearchService $searchService)
    {
        $this->xmlService = $xmlService;
        $this->calculateService = $calculateService;
        $this->searchService = $searchService;
    }

    public function index()
    {

        if (isset($_POST['refresh'])) {
            $this->xmlService->importCurrencyModel();
        }
        if (isset($_POST['id']) && isset($_POST['amount'])) {
            $this->id = $_POST['id'];
            $this->amount = $_POST['amount'];
            $this->calculateService->calculateRate($_POST['id'], $_POST['amount']);
        }

        $id = DB::table('currencies')->get();
        $currency = strtolower($id);

        $fromDropMenu = '';
        if (isset($_POST['ID'])) {
            $fromDropMenu = $_POST['ID'];
        } elseif (isset($_POST['search'])) {

            try {
                $this->searchService->search($_POST['search']);
            } catch (\Exception $exception) {
                return view('exception', ['search' => $_POST['search']]);
            }

            $fromDropMenu = $_POST['search'];

        }

        return view('index', [
            'id' => $id,
            'result' => $this->calculateService->getResult(),
            'isCalculateDone' => $this->calculateService->calculateRate($this->id, $this->amount),
            'currency' => $currency,
            'chose' => $fromDropMenu,
            'post' => $_POST
        ]);
    }
}
