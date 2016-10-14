<?php

/**
 * Part of the InputSanitizer package.
 *
 * @package    InputSanitizer
 * @version    1.0.0
 * @author     Arthur Lorent <arthur.lorent@gmail.com>, Daniel Lucas <daniel.chris.lucas@gmail.com>
 * @license    MIT
 * @copyright  (c) 2006-2016, Acid Solutions SARL
 * @link       http://acid.fr
 */

namespace Acid\InputSanitizer\Native;

use Acid\InputSanitizer\InputSanitizer;

class InputSanitizerBootstrapper
{
    /**
     * Creates an InputSanitizer instance.
     *
     * @return \Acid\InputSanitizer\InputSanitizer
     */
    public function createInputSanitizer()
    {
        return new InputSanitizer();
    }
}
