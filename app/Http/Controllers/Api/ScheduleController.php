<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;

class ScheduleController extends Controller
{
    /**
     * Get the entire weekly schedule
     */
    public function index(): JsonResponse
    {
        $schedules = Schedule::with('show')->orderBy('day_of_week')->orderBy('start_time')->get();

        return response()->json([
            'success' => true,
            'data' => $schedules
        ]);
    }

    /**
     * Get only today's schedule based on East African Time
     */
    public function today(): JsonResponse
    {
        $now = Carbon::now('Africa/Nairobi');
        $dayOfWeek = $now->dayOfWeek;

        $schedules = Schedule::with('show')
            ->where('day_of_week', $dayOfWeek)
            ->orderBy('start_time')
            ->get();

        return response()->json([
            'success' => true,
            'day' => $now->format('l'), // e.g., "Monday"
            'data' => $schedules
        ]);
    }
}
