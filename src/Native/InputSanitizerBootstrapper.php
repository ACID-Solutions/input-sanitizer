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

namespace AcidSolutions\InputSanitizer\Native;

use AcidSolutions\InputSanitizer\InputSanitizer;

class InputSanitizerBootstrapper
{
    /**
     * Creates an InputSanitizer instance.
     *
     * @return \AcidSolutions\InputSanitizer\InputSanitizer
     */
    public function createInputSanitizer()
    {
        return new InputSanitizer();
    }
}
