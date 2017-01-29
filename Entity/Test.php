<?php

namespace Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Test
 *
 * @ORM\Table(name="Test")
 * @ORM\Entity(repositoryClass="Repository\TestRepository")
 */
class Test
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
     * @var string
     *
     * @ORM\Column(name="StringField", type="text", precision=0, scale=0, nullable=false, unique=false)
     */
    private $stringfield;

    /**
     * @var float
     *
     * @ORM\Column(name="NumberField", type="float", precision=10, scale=0, nullable=true, unique=false)
     */
    private $numberfield;


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
     * Set stringfield
     *
     * @param string $stringfield
     *
     * @return Test
     */
    public function setStringfield($stringfield)
    {
        $this->stringfield = $stringfield;

        return $this;
    }

    /**
     * Get stringfield
     *
     * @return string
     */
    public function getStringfield()
    {
        return $this->stringfield;
    }

    /**
     * Set numberfield
     *
     * @param float $numberfield
     *
     * @return Test
     */
    public function setNumberfield($numberfield)
    {
        $this->numberfield = $numberfield;

        return $this;
    }

    /**
     * Get numberfield
     *
     * @return float
     */
    public function getNumberfield()
    {
        return $this->numberfield;
    }
}

