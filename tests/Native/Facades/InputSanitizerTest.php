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

use Acid\InputSanitizer\Native\Facades\InputSanitizer;
use Acid\InputSanitizer\Native\InputSanitizerBootstrapper;
use PHPUnit_Framework_TestCase;

class InputSanitizerBootstrapperTest extends PHPUnit_Framework_TestCase
{
    public function testIntantiate()
    {
        $facade = new InputSanitizer();
        $this->assertInstanceOf(\Acid\InputSanitizer\InputSanitizer::class, $facade->getInputSanitizer());
    }

    public function testInstantiateWithBootstrapper()
    {
        $bootStrapper = new InputSanitizerBootstrapper();
        $facade = new InputSanitizer($bootStrapper);
        $this->assertInstanceOf(\Acid\InputSanitizer\InputSanitizer::class, $facade->getInputSanitizer());
    }

    public function testGetInstance()
    {
        $facade = new InputSanitizer();
        $this->assertInstanceOf(\Acid\InputSanitizer\Native\Facades\InputSanitizer::class, $facade->instance());
    }

    public function testCallMethods()
    {
        $this->assertTrue('true');
        $this->assertTrue(null, true);
        $this->assertTrue(null, true, true);
        $this->assertTrue(null, true, true, 'extra_param');
    }
}
