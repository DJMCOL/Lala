<?php

namespace App\Console\Commands;

use App\Models\ServicePurchase;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;


class UpdateFiftyService extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:services';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Actualizar Compra de Asesorias cada 15 minutos';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->formatted_date = Carbon::now()->subMinutes(2)->toDateTimeString();
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $formatted_date = $this->formatted_date;

        Log::info($formatted_date);

        $servicePurchase = ServicePurchase::where('validate_date', '=', 1)
            ->where('status', '!=', 1)
            ->where('created', '<=', $formatted_date)
            ->get();
        Log::info($servicePurchase);
        foreach ($servicePurchase as $s) {
            $servP = ServicePurchase::find($s->id);
            $servP->validate_date = 2;
            $servP->update();
        }
    }
}
