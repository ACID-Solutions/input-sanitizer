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

namespace Acid\InputSanitizer;

class InputSanitizer
{
    /**
     * Cleans given input and returns cleaned data.
     *
     * @param mixed $entry           The data to clean
     * @param mixed $default         Value to return by default if the input data is falsy
     * @param bool  $jsonDecodeAssoc Should json_decode return an associative array instead of StdClass?
     *
     * @return mixed
     */
    public function sanitize($entry, $default = null, $jsonDecodeAssoc = false)
    {
        // we prepare the return variable
        $return = null;

        // we remove useless spaces
        if (is_string($entry)) {
            $entry = trim($entry);
        }

        // we sanitize the value
        switch (true) {
            case $entry === '':
            case $entry === 'null':
                $return = null;
                break;
            case $entry === 'false':
                $return = false;
                break;
            case $entry === 'true':
            case $entry === 'on':
                $return = true;
                break;
            case is_numeric($entry):
                if (((int)$entry != $entry)) {
                    $return = doubleval($entry);
                } else {
                    $return = intval($entry);
                }
                break;
            case $this->isJson($entry):
                $return = json_decode($entry, $jsonDecodeAssoc);

                if (is_array($return)) {
                    $return = (array) $this->sanitizeAll($return);
                }

                break;
            case is_array($entry):
                $return = $this->sanitizeAll($entry);
                break;
            default:
                $return = $entry;
                break;
        };

        // if the value is null or false, return the default value
        if (isset($default) && !$return) {
            return $default;
        }

        // we return the sanitized value
        return $return;
    }

    /**
     * Recursive method to sanitize deep array of data.
     *
     * @param array $entries Array of data to sanitize
     *
     * @return array
     */
    private function sanitizeAll(array $entries)
    {
        $return = [];
        // for each entry contained into the array
        foreach ($entries as $key => $entry) {
            // we sanitize it
            if (is_array($entry)) {
                $return[$key] = $this->sanitizeAll($entry);
            } else {
                $return[$key] = $this->sanitize($entry);
            }
        }

        // we return the sanitized data
        return $return;
    }

    /**
     * Check if an item is JSON.
     *
     * @param $string Item to check
     *
     * @return bool True if the given item is JSON
     */
    private function isJson($string)
    {
        if (is_array($string)) {
            return false;
        }

        json_decode($string);
        return (json_last_error() == JSON_ERROR_NONE);
    }
}
