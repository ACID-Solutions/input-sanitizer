<?php

/**
 * Part of the InputSanitizer package.
 *
 * @package        InputSanitizer
 * @version        1.0.2
 * @author         Arthur Lorent <arthur.lorent@gmail.com>, Daniel Lucas <daniel.chris.lucas@gmail.com>
 * @license        MIT
 * @copyright  (c) 2006-2017, ACID-Solutions SARL
 * @link           https://acid.fr
 */

namespace AcidSolutions\InputSanitizer\Laravel;

use AcidSolutions\InputSanitizer\InputSanitizer;
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
