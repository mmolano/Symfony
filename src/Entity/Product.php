<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @property \DateTime created_at
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 * @ORM\Table(name="product")
 */
class Product
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=75)
     */
    private $name;

    /**
     * @return int
     */

    /**
     * @ORM\Column(name="prix", type="integer", length=30)

     */
    private $prix;
    /**
     * @ORM\Column(name="achatMax", type="integer", length=25)

     */
    private $achatMax;
    /**
     * @ORM\Column(name="stock", type="integer", length=25)

     */
    private $stock = 10;

    /**
     * @ORM\Column(name="description", type="text")

     */
    private $description;



    /**
     * @ORM\Column(name="created_at", type="datetime")

     */
    private $created_at;


    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return Product
     */
    public function setName(string $name): Product
    {
        $this->name = $name;

        return $this;
    }

    public function getPrix()
    {
        return $this->prix;
    }

    public function setPrix($prix)
    {
        $this->prix = $prix;
    }

    public function getAchatMax()
    {
        return $this->achatMax;
    }

    public function setAchatMax($achatMax)
    {
        $this->achatMax = $achatMax;
    }

    public function getStock()
    {
        return $this->stock;
    }

    public function setStock($stock)
    {
        $this->stock = $stock;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }


    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->created_at;
    }

    /**
     * @param \DateTime $created_at
     */
    public function setCreatedAt(\DateTime $created_at): void
    {
        $this->created_at = $created_at;
    }

    public function __construct()
    {
        $this->created_at = new \DateTime('NOW');
    }




    public function getBrochure()
    {
        return $this->brochure;
    }

    public function setBrochure($brochure)
    {
        $this->brochure = $brochure;

        return $this;
    }
}
