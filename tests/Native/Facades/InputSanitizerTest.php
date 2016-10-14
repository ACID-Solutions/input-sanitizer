<?php

/**
 * Part of the InputSanitizer package.
 *
 * @package    InputSanitizer
 * @version    1.0.0
 * @author     Arthur Lorent <authur.lorent@gmail.com>, Daniel Lucas <daniel.chris.lucas@gmail.com>
 * @license    MIT
 * @copyright  (c) 2006-2016, Acid Solutions SARL
 * @link       http://acid.fr
 */

namespace Acid\InputSanitizer\tests\Native\Facades;

use Acid\InputSanitizer\Native\InputSanitizer;
use Acid\InputSanitizer\Native\InputSanitizerBootstrapper;
use PHPUnit_Framework_TestCase;

class InputSanitizerBootstrapperTest extends PHPUnit_Framework_TestCase
{
    public function testIntantiate()
    {
        $bootstrapper = new InputSanitizer();

        // $inputSanitizer = $bootstrapper->createInputSanitizer();

        $this->assertInstanceOf(\Acid\InputSanitizer\InputSanitizer::class, $inputSanitizer);
    }
}
