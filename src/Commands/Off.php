<?php

namespace DavidGriffiths\NovaDarkTheme\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class Off extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'nova-dark-theme:off';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Sets dark theme OFF by default";

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $path = resource_path('views/vendor/nova/layout.blade.php');

        // Verify the file exists and the class is there
        if (
            ! File::exists($path)
            || ! Str::contains($file = File::get($path), 'nova-dark-theme')
        ) {
            $this->info("\n\nDark theme is already off\n\n");
            return;
        }

        // Strip it out
        $file = preg_replace('#nova-dark-theme\s*#', '', $file);
        File::put($path, $file);

        $this->info("\n\nDark theme is OFF\n\n");
    }

}
