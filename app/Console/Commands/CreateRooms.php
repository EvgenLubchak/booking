<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Room;

class CreateRooms extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:rooms';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create rooms';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Room::factory()->count(50)->create();
    }
}
