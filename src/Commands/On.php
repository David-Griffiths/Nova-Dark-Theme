<?php

namespace DavidGriffiths\NovaDarkTheme\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class On extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'nova-dark-theme:on';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Sets dark theme ON by default";

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->copyLayoutTemplate();
        $this->addDarkThemeClass();

        $this->info("Dark theme is ON\n\n");
    }

    /**
     * Make an editable copy of the main Nova layout template
     *
     * @return void
     */
    protected function copyLayoutTemplate()
    {
        $override_dir = resource_path('views/vendor/nova');
        $override_path = $override_dir . '/layout.blade.php';
        $default_path = base_path('vendor/laravel/nova/resources/views/layout.blade.php');

        if (! File::isDirectory($override_dir)) {
            File::makeDirectory($override_dir);
        }

        if (! File::exists($override_path)) {
            File::copy($default_path, $override_path);
        }
    }

    /**
     * Adds the Dark Theme class to the HTML tag in Nova's layout template
     *
     * @return void
     */
    protected function addDarkThemeClass()
    {
        $path = resource_path('views/vendor/nova/layout.blade.php');
        $template = File::get($path);

        if (! Str::contains($template, 'nova-dark-theme')) {
            $pattern = '#<html[^>]+class\s*=\s*"#';
            $template = preg_replace($pattern, '$0nova-dark-theme ', $template);

            File::put($path, $template);

            $this->info("\nAdded nova-dark-theme class to Nova's layout template:");
        } else {
            $this->info("\nnova-dark-theme class already present in Nova's layout template:");
        }

        $this->line("$path\n");
    }

}
