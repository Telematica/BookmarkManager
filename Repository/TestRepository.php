<?php

namespace Repository;

use Doctrine\ORM\EntityRepository;

class TestRepository extends EntityRepository
{
    /**
     * 
     * @return mixed
     */
    public function import()
    {
        $func = function ($em) {
            $entry = new \Entity\Test;
            $entry->setStringfield('lol');
            $entry->getNumberfield(222121);
            $em->persist($entry);
        };

        return $this->_em->transactional($func);
    }
}