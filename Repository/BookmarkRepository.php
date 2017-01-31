<?php

namespace Repository;

use Doctrine\ORM\EntityRepository;

class BookmarkRepository extends EntityRepository
{
    /**
     * 
     * @return mixed
     */
    public function import($urls)
    {
        $currentRepo = $this;
        $existingUrls = [];
        
        $func = function ($em) use ($urls, $currentRepo, &$existingUrls) {
            foreach ($urls as $url) {
                if (!empty($currentRepo->findByUrl($url))) {
                    $existingUrls[] = $url;
                    continue;
                }
                
                $entry = new \Entity\Bookmark();
                $entry->setDateadded((new \DateTime())->getTimestamp());
                $entry->setUrl($url);
                $em->persist($entry);
                $em->flush();
            }
            
            return !empty($existingUrls) ? $existingUrls : true;
        };
        
        return $this->_em->transactional($func);
    }
}
