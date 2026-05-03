<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Show;
use App\Models\Schedule;
use Illuminate\Support\Str;

class ShowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $shows = [
            [
                'name' => 'Ringi Rimwe',
                'show_host' => 'Master the handsome boy',
                'start_time' => '00:00:00',
                'end_time' => '04:00:00',
            ],
            [
                'name' => 'Ime ria Rucini',
                'show_host' => 'Sonnie Kariuki',
                'start_time' => '04:00:00',
                'end_time' => '06:00:00',
            ],
            [
                'name' => 'Nyumba itu Gwakia',
                'show_host' => 'Mucheru wa Kaboi na Maichocho Mwenyewe',
                'start_time' => '06:00:00',
                'end_time' => '10:00:00',
            ],
            [
                'name' => 'Guthie ni guthie',
                'show_host' => 'Gachiri wa Mwaniki',
                'start_time' => '10:00:00',
                'end_time' => '14:00:00', // 2 PM
            ],
            [
                'name' => 'Kindira',
                'show_host' => 'Double Jay the Dj',
                'start_time' => '14:00:00',
                'end_time' => '16:00:00', // 4 PM
            ],
            [
                'name' => 'Rikia Rethi',
                'show_host' => 'Shiru wa Wambui',
                'start_time' => '16:00:00',
                'end_time' => '20:00:00', // 8 PM
            ],
            [
                'name' => "Njung'wa ya nyumba itu",
                'show_host' => 'Jakai wa kiragu na mumbi',
                'start_time' => '20:00:00',
                'end_time' => '23:59:59', // Ends just before midnight to avoid overlapping days
            ],
        ];

        // Assuming "Daily" means all 7 days of the week.
        // 0 = Sunday, 1 = Monday, 2 = Tuesday, 3 = Wednesday, 4 = Thursday, 5 = Friday, 6 = Saturday
        // If they only play Monday-Friday, change this to: $daysOfWeek = [1, 2, 3, 4, 5];
        $daysOfWeek = [0, 1, 2, 3, 4, 5, 6];

        foreach ($shows as $data) {
            // 1. Create the Show
            $show = Show::create([
                'name' => $data['name'],
                'slug' => Str::slug($data['name']),
                'show_host' => $data['show_host'],
                'excerpt' => 'Join ' . $data['show_host'] . ' for ' . $data['name'] . ' live on Nyumba iitu FM.',
            ]);

            // 2. Attach the schedule for every day of the week
            foreach ($daysOfWeek as $day) {
                Schedule::create([
                    'show_id' => $show->id,
                    'day_of_week' => $day,
                    'start_time' => $data['start_time'],
                    'end_time' => $data['end_time'],
                ]);
            }
        }
    }
}
