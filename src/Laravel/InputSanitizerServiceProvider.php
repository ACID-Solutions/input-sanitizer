<?php

/**
 * Part of the InputSanitizer package.
 *
 * @package    InputSanitizer
 * @version    1.0.0
 * @author     Arthur Lorent <arthur.lorent@gmail.com>, Daniel Lucas <daniel.chris.lucas@gmail.com>
 * @license    MIT
 * @copyright  (c) 2006-2016, Acid Solutions SARL
 * @link       https://acid.fr
 */

namespace Acid\InputSanitizer\Laravel;

use Illuminate\Support\ServiceProvider;

class InputSanitizerServiceProvider extends ServiceProvider
{
    /**
     * {@inheritDoc}
     */
    public function register()
    {
        $this->registerInputSanitizer();
    }

    /**
     * Registers input sanitizer.
     *
     * @return void
     */
    protected function registerInputSanitizer()
    {
        $this->app->singleton('input_sanitizer', function () {
            return new InputSanitizer();
        });
    }
}
