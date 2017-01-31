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
    public function import($urls)
    {
        $repo = $this->em->getRepository(\Entity\Bookmark::class);
        
        try {
            $return = $repo->import($urls);
        } catch(\Exception $e) {
            
        }
        
        return $return;
    }
}