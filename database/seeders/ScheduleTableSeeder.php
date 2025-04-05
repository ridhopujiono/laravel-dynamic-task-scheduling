<?php

namespace Database\Seeders;

use App\Models\Schedule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScheduleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'ClosureEveryMinute',
                'frequency' => 'everyMinute',
                'command' => null,
                'params' => null,
                'days' => null,
                'active' => true,
            ],
            [
                'name' => 'ClosureSundayAt1220',
                'frequency' => 'dailyAt',
                'command' => null,
                'params' => '12:20',
                'days' => 'sundays',
                'active' => true,
            ],
            [
                'name' => 'CommandDailyInspire',
                'frequency' => 'daily',
                'command' => 'inspire',
                'params' => null,
                'days' => null,
                'active' => true,
            ],
            [
                'name' => 'CommandHourlyWithDay',
                'frequency' => 'hourly',
                'command' => 'queue:work',
                'params' => null,
                'days' => 'mondays,wednesdays',
                'active' => true,
            ],
            [
                'name' => 'ClosureTwiceDaily',
                'frequency' => 'twiceDaily',
                'command' => null,
                'params' => '1,13',
                'days' => null,
                'active' => true,
            ],
            [
                'name' => 'CommandRunAtNight',
                'frequency' => 'dailyAt',
                'command' => 'optimize',
                'params' => '23:45',
                'days' => null,
                'active' => true,
            ],
            [
                'name' => 'CommandSundayQueueRestart',
                'frequency' => 'daily',
                'command' => 'queue:restart',
                'params' => null,
                'days' => 'sundays',
                'active' => true,
            ],
            [
                'name' => 'ClosureSaturdayMorning',
                'frequency' => 'dailyAt',
                'command' => null,
                'params' => '07:00',
                'days' => 'saturdays',
                'active' => true,
            ],
            [
                'name' => 'CommandDailyBackup',
                'frequency' => 'dailyAt',
                'command' => 'backup:run',
                'params' => '01:30',
                'days' => null,
                'active' => true,
            ],
            [
                'name' => 'ClosureTuesdaysOnly',
                'frequency' => 'daily',
                'command' => null,
                'params' => null,
                'days' => 'tuesdays',
                'active' => true,
            ],
        ];

        foreach ($data as $task) {
            Schedule::create($task);
        }
    }
}
