<?php
namespace Base;

use Entities\Entity;

class Block extends Entity
{
    use Insert;
    protected $data = [
        'name' => 'test',
        'type' => 0,
        'point' => [0, 0]
    ];
    protected $entities = null;

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

    public function getName()
    {
        return $this->data['name'];
    }

    public function __toString()
    {
        $str = '0' . PHP_EOL . 'BLOCK' . PHP_EOL . '8' . PHP_EOL . '%s' . PHP_EOL .
               '2' . PHP_EOL . '%s' . PHP_EOL . '70' . PHP_EOL . '%d' . PHP_EOL .
               $this->getOptionalProperties() .
               '10' . PHP_EOL . '%.2f' . PHP_EOL . '20' . PHP_EOL . '%.2f' . PHP_EOL .
               '3' . PHP_EOL . '%s' . PHP_EOL . $this->entities . '0' . PHP_EOL .
               'ENDBLK' . PHP_EOL;

        return sprintf(
            $str,
            $this->common['layer'],
            $this->data['name'],
            $this->data['type'],
            $this->data['point'][0],
            $this->data['point'][1],
            $this->data['name'],
        );
    }
}
