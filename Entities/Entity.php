<?php
namespace DXFMaker\Entities;

abstract class Entity
{
    protected $common = [
        'layer' => 0,
        'line' => '',
        'color' => '',
    ];
    protected $data;

    public function __construct(array $properties)
    {
        foreach ($properties as $key => $value) {
            if (array_key_exists($key, $this->data)) {
                $this->data[$key] = $value;
            } elseif (array_key_exists($key, $this->common)) {
                $this->common[$key] = $value;
            } else {
                echo $key . ' is unknown property for ' . strtoupper(get_class($this));
                die;
            }
        }
    }

    public function getOptionalProperties()
    {
        $optional = '';
        if ($this->common['line']) {
            $optional .= '6' . PHP_EOL . $this->common['line'] . PHP_EOL;
        }
        if ($this->common['color']) {
            $optional .= '62' . PHP_EOL . sprintf('%d', $this->common['color']) . PHP_EOL;
        }
        return $optional;
    }

    abstract public function __toString();
}
