<?php

use Illuminate\Support\Facades\Schedule;
use App\Models\Schedule as TaskSchedule;
use Illuminate\Console\Scheduling\Schedule as SchedulingSchedule;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Log;

$days = [
    'sundays' => SchedulingSchedule::SUNDAY,
    'mondays' => SchedulingSchedule::MONDAY,
    'tuesdays' => SchedulingSchedule::TUESDAY,
    'wednesdays' => SchedulingSchedule::WEDNESDAY,
    'thursdays' => SchedulingSchedule::THURSDAY,
    'fridays' => SchedulingSchedule::FRIDAY,
    'saturdays' => SchedulingSchedule::SATURDAY,
];


if (Schema::hasTable('schedules')) {
    $taskSchedules = TaskSchedule::where('active', true)->get();

    foreach ($taskSchedules as $taskSchedule) {

        $event = Schedule::command($taskSchedule->command);

        if ($taskSchedule->frequency) {
            $event->{$taskSchedule->frequency}();
        }


        if ($taskSchedule->days) {
            $convertedDays = [];
            foreach ($taskSchedule->days as $day) {
                $convertedDays[] = $days[$day];
            }
            $event->days($convertedDays);
        }

        if ($taskSchedule->time) {
            $event->at($taskSchedule->time);
        }

        $event->timezone('Asia/Jakarta');
        $event->name($taskSchedule->name);
    }
}
