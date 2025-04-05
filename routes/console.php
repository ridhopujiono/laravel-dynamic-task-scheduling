<?php
use Illuminate\Support\Facades\Schedule;
use App\Models\Schedule as TaskSchedule;
use Illuminate\Support\Facades\Log;

$taskSchedules = TaskSchedule::where('active', true)->get();

foreach ($taskSchedules as $taskSchedule) {
    $params = $taskSchedule->params ? explode(",", $taskSchedule->params) : [];
    $days = $taskSchedule->days ? explode(",", $taskSchedule->days) : [];

    $event = $taskSchedule->command
        ? Schedule::command($taskSchedule->command)->{$taskSchedule->frequency}(...$params)
        : Schedule::call(function () use ($taskSchedule) {
            Log::info("{$taskSchedule->name} run at " . now());
        })->{$taskSchedule->frequency}(...$params);

    foreach ($days as $dayMethod) {
        if (method_exists($event, $dayMethod)) {
            $event->{$dayMethod}();
        }
    }

    $event->name($taskSchedule->name);
}
