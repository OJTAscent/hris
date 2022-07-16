<?php 

namespace App\Providers;
 
 use Illuminate\Support\ServiceProvider;
/**
* ServiceProvider
*
* The service provider for the modules. After being registered
* it will make sure that each of the modules are properly loaded
* i.e. with their routes, views etc.
*
* @author Kamran Ahmed <kamranahmed.se@gmail.com>
* @package App\Modules
*/
class ModulesServiceProvider extends ServiceProvider
{
    /**
     * Will make sure that the required modules have been fully loaded
     * @return void
     */
    public function boot()
    {
        // For each of the registered modules, include their routes and Views
        $modules = config("module.modules");
        $module_path = app_path().'/Modules';

        // while (list(,$module) = each($modules)) {
        foreach($modules as $key => $module) {            
            // Load the routes for each of the modules
            if(file_exists(__DIR__.'/../Modules/'.$module.'/routes.php')) {
                include __DIR__.'/../Modules/'.$module.'/routes.php';
            }

            // Load the views
            if(is_dir(__DIR__.'/../Modules/'.$module.'/Views')) {
                $this->loadViewsFrom(__DIR__.'/../Modules/'.$module.'/Views', strtolower($module));
            }
        }
    }

    public function register() {

    }

}