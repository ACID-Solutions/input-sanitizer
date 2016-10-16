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

namespace AcidSolutions\InputSanitizer\Laravel\Facades;

use Illuminate\Support\Facades\Facade;

class InputSanitizer extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'input_sanitizer';
    }
}
