<?php

namespace Repository;

use Doctrine\ORM\EntityRepository;

class BookmarkRepository extends EntityRepository
{
    /**
     * 
     * @return mixed
     */
    public function import()
    {
        $func = function ($em) {
            $entry = new \Entity\BookmarkTags();
            $entry->setBookmarkId(10);
            $entry->setTagId(30);
            $em->persist($entry);
        };

        return $this->_em->transactional($func);
    }
}