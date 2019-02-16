<?php

namespace DavidGriffiths\NovaDarkTheme\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class RemoveSwitch extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'nova-dark-theme:remove-switch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Removes toggle switch from user menu";

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $path = resource_path('views/vendor/nova/partials/user.blade.php');

        // Verify the file exists and the Vue component is there
        if (
            ! File::exists($path)
            || ! Str::contains($file = File::get($path), 'nova-dark-theme-toggle')
        ) {
            $this->info("\n\nToggle switch has already been removed!\n\n");
            return;
        }

        // Strip it out
        $pattern = '#<li[^>]*>\s*<nova-dark-theme-toggle.*?</nova-dark-theme-toggle>\s*</li>#s';
        $file = preg_replace($pattern, '', $file);
        File::put($path, $file);

        $this->info("\n\nRemoved toggle switch from menu template:");
        $this->line("$path\n\n");
    }

}
