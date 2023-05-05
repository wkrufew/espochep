<?php

namespace Database\Seeders;

use App\Models\Detail;
use App\Models\Image;
use App\Models\Process;
use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProcessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $model = Image::class;

    public function run()
    {
        $processes = Process::factory(40)->create();

        foreach ($processes as $process) {
            $sections = Section::factory(4)->create([
                            'process_id' => $process->id,
                        ]);

            foreach ($sections as $section) {
                Detail::factory(1)->create([
                    'section_id' => $section->id
                ]);
            }
        }
    }
}
