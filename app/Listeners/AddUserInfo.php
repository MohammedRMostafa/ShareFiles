<?php

namespace App\Listeners;

use App\Events\DownloadFile;
use App\Models\FileDetails;
use Stevebauman\Location\Facades\Location;

class AddUserInfo
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(DownloadFile $event): void
    {
        $request = $event->request;
        $country = Location::get($request->ip());
        FileDetails::create([
            'file_id' => $request->query('file_id'),
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'country' => $country,
        ]);
    }
}