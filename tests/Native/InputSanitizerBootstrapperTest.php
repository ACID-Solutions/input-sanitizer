<?php

/**
 * Part of the InputSanitizer package.
 *
 * @package    InputSanitizer
 * @version    1.0.2
 * @author     Arthur Lorent <arthur.lorent@gmail.com>, Daniel Lucas <daniel.chris.lucas@gmail.com>
 * @license    MIT
 * @copyright  (c) 2006-2017, ACID-Solutions SARL
 * @link       https://acid.fr
 */

namespace AcidSolutions\InputSanitizer\tests\Native;

use AcidSolutions\InputSanitizer\Native\InputSanitizerBootstrapper;
use PHPUnit_Framework_TestCase;

class InputSanitizerBootstrapperTest extends PHPUnit_Framework_TestCase
{
    public function testIntantiate()
    {
        $bootstrapper = new InputSanitizerBootstrapper();

        $inputSanitizer = $bootstrapper->createInputSanitizer();

        $this->assertInstanceOf(\AcidSolutions\InputSanitizer\InputSanitizer::class, $inputSanitizer);
    }
}
