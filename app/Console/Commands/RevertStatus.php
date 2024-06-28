<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Rental;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class RevertStatus extends Command
{
    protected $signature = 'revert:status';
    protected $description = 'Revert status of rentals and garages on checkout date';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        Log::info('RevertStatus command started at ' . Carbon::now());

        $rentals = Rental::with('garasi')
            ->where('tanggal_akhir', '<=', Carbon::now())
            ->where('status', 'aktif')
            ->get();

        foreach ($rentals as $rental) {
            $rental->update(['status' => 'selesai']);
            $rental->garasi->update(['status' => 'tersedia']);
            Log::info('Rental ID ' . $rental->id . ' and Garasi ID ' . $rental->garasi->id . ' status updated.');
        }

        Log::info('RevertStatus command finished at ' . Carbon::now());

        return 0;
    }
}
