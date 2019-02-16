<?php

namespace DavidGriffiths\NovaDarkTheme\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class AddSwitch extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'nova-dark-theme:add-switch';

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
        $this->copyMenuTemplate();
        $this->addVueComponent();
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
     * Adds the Dark theme on/off toggle to the user menu template if it's not already there
     *
     * @return void
     */
    protected function addVueComponent()
    {
        $path = resource_path('views/vendor/nova/partials/user.blade.php');
        $template = File::get($path);

        if (! Str::contains($template, 'nova-dark-theme-toggle')) {
            $toggle = File::get(__DIR__ . '/../../resources/views/partials/toggle.blade.php');
            $template = Str::replaceLast('</li>', "</li>\n$toggle", $template);

            File::put($path, $template);
            $this->info("\nAdded Vue dark theme toggle to user menu:");
        } else {
            $this->line("\nVue dark theme toggle already present in user menu:");
        }

        $this->line("$path\n");
    }

}
