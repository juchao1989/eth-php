<?php

namespace EthereumPHP\Types;

class Transaction
{
    private $from;
    private $to;
    private $data;
    private $gas;
    private $gasPrice;
    private $value;
    private $nonce;

    public function __construct(Address $from, Address $to, string $data = null, int $gas = null, Wei $gasPrice = null, int $value = null, int $nonce = null)
    {
        $this->from = $from;
        $this->to = $to;
        $this->data = $data;
        $this->gas = $gas;
        $this->gasPrice = $gasPrice;
        $this->value = $value;
        $this->nonce = $nonce;
    }

    public function toArray(): array
    {
        $transaction = [
            'from' => $this->from->toString(),
            'to' => $this->to->toString(),
        ];

        if (!is_null($this->data))
            $transaction['data'] = $this->dechexAutomation($this->data);


        if (!is_null($this->gas))
            $transaction['gas'] = $this->dechexAutomation($this->gas);


        if (!is_null($this->gasPrice))
            $transaction['gasPrice'] = $this->dechexAutomation($this->gasPrice->amount());


        if (!is_null($this->value))
            $transaction['value'] = $this->dechexAutomation($this->value);


        if (!is_null($this->nonce))
            $transaction['nonce'] = $this->dechexAutomation($this->nonce);


        return $transaction;
    }

    public function dechexAutomation($data)
    {
        return sprintf("0x%s", dechex($data));
    }
}
