<?php

namespace EthereumPHP\Types;

class Hash
{
    private $hash;

    public function __construct(string $hash)
    {
        if (strlen($hash) !== 66) {
            throw new \LengthException($hash . ' is not valid.');
        }
        $this->hash = $hash;
    }

    public function __toString(): string
    {
        return $this->hash;
    }

    public function toString(): string
    {
        return $this->hash;
    }
}
