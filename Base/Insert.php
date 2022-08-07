<?php
namespace Base;

use Entities\Entity;

trait Insert
{
    public function insertEntity(Entity $entity)
    {
        $this->entities .= sprintf('%s', $entity);
    }
}
