<?php

namespace Framework\Service;

/**
 * Class ParameterBag
 * @package Framework\Service
 */
class ParameterBag
{
    /**
     * @var array
     */
    protected $parameters;

    /**
     * ParameterBag constructor.
     * @param array $parameters
     */
    public function __construct(array $parameters = [])
    {
        $this->parameters = $parameters;
    }

    /**
     * Returns the parameters.
     *
     * @return array An array of parameters
     */
    public function all()
    {
        return $this->parameters;
    }

    /**
     * Returns a parameter by name.
     *
     * @param string $key
     * @param mixed $default The default value if the parameter key does not exist
     *
     * @return mixed
     */
    public function get(string $key, $default = null)
    {
        return \array_key_exists($key, $this->parameters) ? $this->parameters[$key] : $default;
    }

    /**
     * Sets a parameter by name.
     *
     * @param string $key
     * @param mixed $value The value
     */
    public function set(string $key, $value)
    {
        $this->parameters[$key] = $value;
    }
}