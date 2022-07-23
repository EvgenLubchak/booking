<?php

declare(strict_types=1);

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
    protected $signature = 'create:rooms {count}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create rooms';

    /**
     * Execute the console command.
     * Add more rooms to database
     *
     * @return int
     */
    public function handle(): int
    {
        $cnt = intval($this->argument('count'));
        $collection = Room::factory()->count($cnt)->create();
        if ($collection->count()) {
            $this->info($cnt . ' rooms added');
        } else {
            $this->info('oops something wrong');
        }
        return 0;
    }
}
