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

namespace AcidSolutions\InputSanitizer\Native\Facades;

use AcidSolutions\InputSanitizer\Native\InputSanitizerBootstrapper;

class InputSanitizer
{
    /**
     * The InputSanitizer instance.
     *
     * @var \AcidSolutions\InputSanitizer\InputSanitizer
     */
    protected $inputSanitizer;
    /**
     * The Native BootStrapper instance.
     *
     * @var InputSanitizerBootstrapper
     */
    protected static $instance;

    /**
     * Constructor.
     *
     * @param InputSanitizerBootstrapper $bootstrapper
     */
    public function __construct(InputSanitizerBootstrapper $bootstrapper = null)
    {
        if ($bootstrapper === null) {
            $bootstrapper = new InputSanitizerBootstrapper;
        }

        $this->inputSanitizer = $bootstrapper->createInputSanitizer();
    }

    /**
     * Returns the InputSanitizer instance.
     *
     * @return \AcidSolutions\InputSanitizer\InputSanitizer
     */
    public function getInputSanitizer()
    {
        return $this->inputSanitizer;
    }

    /**
     * Creates a new Native Bootstrapper instance.
     *
     * @param InputSanitizerBootstrapper $bootstrapper
     *
     * @return void
     */
    public static function instance(InputSanitizerBootstrapper $bootstrapper = null)
    {
        if (static::$instance === null) {
            static::$instance = new static($bootstrapper);
        }

        return static::$instance;
    }

    /**
     * Handle dynamic, static calls to the object.
     *
     * @param string $method
     * @param array  $args
     *
     * @return mixed
     */
    public static function __callStatic($method, $args)
    {
        $instance = static::instance()->getInputSanitizer();
        switch (count($args)) {
            case 1:
                return $instance->{$method}($args[0]);

            case 2:
                return $instance->{$method}($args[0], $args[1]);

            case 3:
                return $instance->{$method}($args[0], $args[1], $args[2]);

            default:
                return call_user_func_array([$instance, $method], $args);
        }
    }
}
