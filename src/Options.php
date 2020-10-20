<?php

/*
 * The MIT License
 *
 * Copyright 2020 deadl.
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

    protected $options;

    public function setOption(string $key, $value): self
    {
        $method = 'set' . \ucfirst($key);

        if (method_exists($this, $method)) {
            $this->$method($value);
        } else {
            $this->options[$key] = $value;
        }

        return $this;
    }

    public function setOptions(array $options = null, $simple_assign = false)
    {

        // store options by default
        if ($simple_assign === true) {
            $this->options += (array) $options;
            return;
        }
        // apply options
        foreach ($options as $key => $value) {
            $this->setOption($key, $value);
        }
    }

    public function getOption($key, $defaults = null)
    {
        $method = 'get' . \ucfirst($key);
        if (method_exists($this, $method)) {
            return $this->$method($key, ...$keys);
        }
        if (isset($this->options[$key])) {
            return $this->options[$key];
        }
        return $defaults;
    }

    public function getOptions()
    {
        return $this->options;
    }
}
