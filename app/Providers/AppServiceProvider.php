<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Form;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        Form::macro(
            'selectRequired',
            function($name, $options = [], $selected = null, $attributes = [], $disabled = [])
            {
                $html = '<select name="' . $name . '"';
                foreach ($attributes as $attribute => $value)
                {
                    $html .= ' ' . $attribute . '="' . $value . '"';
                }
                $html .= '>';
                
                foreach ($options as $value => $text)
                {
                    $html .= '<option value="' . $value . '"' .
                        ($value == $selected ? ' selected="selected"' : '') .
                        (in_array($value, $disabled) ? ' disabled="disabled"' : '') . '>' .
                        $text . '</option>';
                }
         
                $html .= '</select>';
         
                return $html;
            }
        );
    }
}
