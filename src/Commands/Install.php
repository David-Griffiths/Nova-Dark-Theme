<?php

namespace DavidGriffiths\NovaDarkTheme\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class Install extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'nova-dark-theme:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Adds toggle switch to user menu";

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->info("\nInstalling Nova Dark Theme...\n");

        $this->copyMenuTemplate();
        $this->addVueComponent();

        $this->info("Done!\n\n");
    }

    /**
     * Ensure the Nova menu override file is present
     *
     * @return void
     */
    protected function copyMenuTemplate()
    {
        $override_dir = resource_path('views/vendor/nova/partials');
        $override_path = $override_dir . '/user.blade.php';
        $default_path = base_path('vendor/laravel/nova/resources/views/partials/user.blade.php');

        if (! File::isDirectory($override_dir)) {
            File::makeDirectory($override_dir);
        }

        if (! File::exists($override_path)) {
            File::copy($default_path, $override_path);
            $this->info("Copied default menu template...\n");
        }
    }

    /**
     * Adds the Dark them on/off toggle to the user menu template if it's not already there
     *
     * @return void
     */
    protected function addVueComponent()
    {
        $override_path = resource_path('views/vendor/nova/partials/user.blade.php');
        $template = File::get($override_path);

        if (! Str::contains($template, 'nova-dark-theme-toggle')) {
            $toggle = File::get(__DIR__ . '/../../resources/views/partials/toggle.blade.php');
            $template = Str::replaceLast('</li>', "</li>\n$toggle", $template);

            File::put($override_path, $template);
            $this->info("Added Vue dark theme toggle to user menu...");
        } else {
            $this->line("Vue dark theme toggle already present in user menu...");
        }

        $this->line("$override_path\n");
    }

}
