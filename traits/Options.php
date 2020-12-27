<?php

declare(strict_types=1);

namespace Enjoys\Traits;

/**
 * Trait Options
 * @package Enjoys\Traits
 */
trait Options
{
    /**
     *
     * @var array<mixed>
     */
    protected array $options = [];

    /**
     *
     * @param string $key
     * @param mixed $value
     * @return $this
     */
    public function setOption(string $key, $value): self
    {
        $method = 'set' . ucfirst($key);
        if (method_exists($this, $method)) {
            $this->$method($value);
            return $this;
        }

        $this->options[$key] = $value;
        return $this;
    }

    /**
     *
     * @param string $key
     * @param mixed $defaults
     * @return mixed
     */
    public function getOption(string $key, $defaults = null)
    {
        $method = 'get' . ucfirst($key);
        if (method_exists($this, $method)) {
            return $this->$method($defaults);
        }

        if (isset($this->options[$key])) {
            return $this->options[$key];
        }
        return $defaults;
    }

    /**
     *
     * @param array<mixed> $options
     * @return $this
     */
    public function setOptions(array $options = []): self
    {
        foreach ($options as $key => $value) {
            $this->setOption((string)$key, $value);
        }
        return $this;
    }

    /**
     *
     * @return array<mixed>
     */
    public function getOptions(): array
    {
        return $this->options;
    }
}
