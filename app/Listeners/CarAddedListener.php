<?php

namespace App\Listeners;

use App\Events\CarAddedEvent;
use App\Commude\Contracts\CarInterface;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CarAddedListener
{
    /**
     * Create the event listener.
     */
    public function __construct(public CarInterface $repository) {}

    /**
     * Handle the event.
     */
    public function handle(CarAddedEvent $event): void
    {
        $this->repository->create($event->data);
    }
}
