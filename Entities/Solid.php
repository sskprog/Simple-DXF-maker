<?php
namespace Entities;

class Solid extends Entity
{
    protected $data = [
        'points' => []
    ];

    public function __toString()
    {
        $str = '0' . PHP_EOL . 'SOLID' . PHP_EOL . '8' . PHP_EOL . '%s' . PHP_EOL .
        $this->getOptionalProperties() .
        '10' . PHP_EOL . '%.2f' . PHP_EOL . '20' . PHP_EOL . '%.2f' . PHP_EOL .
        '11' . PHP_EOL . '%.2f' . PHP_EOL . '21' . PHP_EOL . '%.2f' . PHP_EOL .
        '12' . PHP_EOL . '%.2f' . PHP_EOL . '22' . PHP_EOL . '%.2f' . PHP_EOL;
        if (isset($this->data['points'[3]])) {
            $str .= '13' . PHP_EOL . '%.2f' . PHP_EOL . '23' . PHP_EOL . '%.2f' . PHP_EOL;
        }

        return sprintf(
            $str,
            $this->common['layer'],
            $this->data['points'][0][0],
            $this->data['points'][0][1],
            $this->data['points'][1][0],
            $this->data['points'][1][1],
            $this->data['points'][2][0],
            $this->data['points'][2][1],
            $this->data['points'][3][0],
            $this->data['points'][3][1],
        );
    }
}
