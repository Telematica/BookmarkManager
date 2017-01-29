<?php

namespace App;

use Doctrine\ORM\EntityManager;

/**
 * 
 */
class Import
{
    /**
     *
     * @var EntityManager
     */
    private $em;
    
    /**
     * 
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }
    
    /**
     * 
     * @return NULL
     */
    public function import()
    {
        $repo = $this->em->getRepository(\Entity\Test::class);
        $repo->import();
        
        return NULL;
    }
}