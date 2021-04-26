<?php

namespace App\Console\Commands;

use App\Repositories\XMLRepository;
use Illuminate\Console\Command;

class CurrencyImportCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'currency:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'import currencies from bank.lv';
    private XMLRepository $XMLService;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(XMLRepository $XMLService)
    {
        parent::__construct();
        $this->XMLService = $XMLService;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $i=10;
        while (true){
            $this->XMLService->importCurrencyModel();
            while ($i!=0){
                echo $i.' ';
                sleep(1);
                $i--;
            }
            echo 'refresh Success'.PHP_EOL;
            $i=10;
        }
        return 0;

    }
}
