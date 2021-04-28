<?php

namespace App\Console\Commands;

use App\Services\CalculateService;
use Illuminate\Console\Command;

class CalculateRateCommand extends Command
{

    protected $signature = 'calculate:rate';


    protected $description = 'calculate rate of currencies';
    private CalculateService $calculateService;


    public function __construct(CalculateService $calculateService)
    {
        parent::__construct();
        $this->calculateService = $calculateService;
    }


    public function handle()
    {
        $id = readline('Enter currency code');
        $amount = readline('Enter amount');
        $this->calculateService->calculateRate($id, $amount);
        echo $this->calculateService->getResult().PHP_EOL;

        return 0;
    }
}
