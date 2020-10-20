<?php

/*
 * The MIT License
 *
 * Copyright 2020 Enjoys.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

namespace Enjoys\Traits;

/**
 *
 * @author Enjoys
 */
trait Options
{

    /**
     *
     * @var array
     */
    protected $options = [];

    /**
     * 
     * @param string $key
     * @param mixed $value
     * @return \self
     */
    public function setOption(string $key, $value): self
    {
        $this->options[$key] = $value;
        return $this;
    }

    /**
     * 
     * @param string $key
     * @param type $defaults
     * @return mixed
     */
    public function getOption(string $key, $defaults = null)
    {
        if (isset($this->options[$key])) {
            return $this->options[$key];
        }
        return $defaults;
    }

    /**
     * 
     * @param array $options
     * @return \self
     */
    public function setOptions(array $options = []): self
    {
        foreach ($options as $key => $value) {
            $this->setOption((string) $key, $value);
        }
        return $this;
    }

    /**
     * 
     * @return array
     */
    public function getOptions(): array
    {
        return $this->options;
    }
}
