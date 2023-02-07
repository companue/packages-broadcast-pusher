<?php

namespace Companue\BroadcastPusher\Console\Commands;

use Companue\BroadcastPusher\Events\SamplePrivateEvent;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class DispatchEventCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dispatch {event=default}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Dispatches an event';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if ($this->argument('event') === 'default')
            $event = SamplePrivateEvent::class;
        else
            $event = "App\Events\\" . $this->argument('event');

        event(new $event());
        $this->newLine(1);
        $this->info('a new ' . $event . " dispatched to " . env('BROADCAST_DRIVER') . ':' . env('PUSHER_APP_ID'));
        $this->newLine(1);
        return 0;
    }
}
