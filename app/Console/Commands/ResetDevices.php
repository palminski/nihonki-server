<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Device;

class ResetDevices extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:reset-devices';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete all device records so that users can make free requests again';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $count = Device::count();
        Device::truncate();
        $this->info("Deleted {$count} Records");
        return 0;
    }
}
