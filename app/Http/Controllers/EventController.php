<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function getEventsBetweenDates(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Fetch events from the database between the specified dates
        $events = Event::whereBetween('date', [$startDate, $endDate])->get();

        return response()->json($events);
    }

    public function getFlightsForNextWeek()
{
    $startDate = now()->startOfWeek();
    $endDate = now()->endOfWeek();

    // Fetch flights from the database for the next week
    $flights = Event::whereBetween('date', [$startDate, $endDate])
                    ->where('activity_type', 'Flight')
                    ->get();

    return response()->json($flights);
}

public function getStandbyEventsForNextWeek()
{
    $startDate = now()->startOfWeek();
    $endDate = now()->endOfWeek();

    // Fetch standby events from the database for the next week
    $standbyEvents = Event::whereBetween('date', [$startDate, $endDate])
                          ->where('activity_type', 'Standby')
                          ->get();

    return response()->json($standbyEvents);
}

public function getFlightsFromLocation($location)
{
    // Fetch flights from the database starting at the given location
    $flights = Event::where('activity_type', 'Flight')
                    ->where('from', $location)
                    ->get();

    return response()->json($flights);
}

}
