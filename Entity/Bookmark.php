<?php

namespace Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bookmark
 *
 * @ORM\Table(name="bookmark")
 * @ORM\Entity(repositoryClass="Repository\BookmarkRepository")
 */
class Bookmark
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="dateAdded", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $dateadded;

    /**
     * @var string
     *
     * @ORM\Column(name="note", type="text", precision=0, scale=0, nullable=true, unique=false)
     */
    private $note;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="text", precision=0, scale=0, nullable=true, unique=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="text", precision=0, scale=0, nullable=false, unique=false)
     */
    private $url;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Entity\Tag", inversedBy="bookmarks")
     * @ORM\JoinTable(name="bookmark_tags",
     *   joinColumns={
     *     @ORM\JoinColumn(name="bookmark_id", referencedColumnName="id", nullable=true)
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="tag_id", referencedColumnName="id", nullable=true)
     *   }
     * )
     */
    private $tags;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tags = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set dateadded
     *
     * @param integer $dateadded
     *
     * @return Bookmark
     */
    public function setDateadded($dateadded)
    {
        $this->dateadded = $dateadded;

        return $this;
    }

    /**
     * Get dateadded
     *
     * @return integer
     */
    public function getDateadded()
    {
        return $this->dateadded;
    }

    /**
     * Set note
     *
     * @param string $note
     *
     * @return Bookmark
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return string
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Bookmark
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set url
     *
     * @param string $url
     *
     * @return Bookmark
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Add tag
     *
     * @param \Entity\Tag $tag
     *
     * @return Bookmark
     */
    public function addTag(\Entity\Tag $tag)
    {
        $this->tags[] = $tag;

        return $this;
    }

    /**
     * Remove tag
     *
     * @param \Entity\Tag $tag
     */
    public function removeTag(\Entity\Tag $tag)
    {
        $this->tags->removeElement($tag);
    }

    /**
     * Get tags
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTags()
    {
        return $this->tags;
    }
}

