<?php
namespace Face;

abstract class Face
{
    protected $common = [
        'name' => null,
        'flag' => 64
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

    abstract public function __toString();
}
