<?php

/**
 * Part of the InputSanitizer package.
 *
 * @package    InputSanitizer
 * @version    1.0.0
 * @author     Arthur Lorent <authur.lorent@gmail.com>, Daniel Lucas <daniel.chris.lucas@gmail.com>
 * @license    MIT
 * @copyright  (c) 2006-2016, Acid Solutions SARL
 * @link       https://acid.fr
 */

namespace AcidSolutions\InputSanitizer\tests\Native\Facades;

use AcidSolutions\InputSanitizer\Native\Facades\InputSanitizer;
use AcidSolutions\InputSanitizer\Native\InputSanitizerBootstrapper;
use PHPUnit_Framework_TestCase;

class InputSanitizerBootstrapperTest extends PHPUnit_Framework_TestCase
{
    public function testIntantiate()
    {
        $facade = new InputSanitizer();
        $this->assertInstanceOf(\AcidSolutions\InputSanitizer\InputSanitizer::class, $facade->getInputSanitizer());
    }

    public function testInstantiateWithBootstrapper()
    {
        $bootStrapper = new InputSanitizerBootstrapper();
        $facade = new InputSanitizer($bootStrapper);
        $this->assertInstanceOf(\AcidSolutions\InputSanitizer\InputSanitizer::class, $facade->getInputSanitizer());
    }

    public function testGetInstance()
    {
        $facade = new InputSanitizer();
        $this->assertInstanceOf(\AcidSolutions\InputSanitizer\Native\Facades\InputSanitizer::class, $facade->instance());
    }

    public function testCallMethods()
    {
        $facade = new InputSanitizer();

        $this->assertTrue($facade::sanitize('true'));
        $this->assertTrue($facade::sanitize(null, true));
        $this->assertTrue($facade::sanitize(null, true, true));
        $this->assertTrue($facade::sanitize(null, true, true, 'extra_param'));
    }
}
