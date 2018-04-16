<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Image.
 *
 * @ORM\Table(name="image", indexes={@ORM\Index(name="IDX_C53D045FBD95B80F", columns={"bien_id"})})
 * @ORM\Entity
 */
class Image
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="blob", length=0, nullable=false)
     */
    private $image;

    /**
     * @var \Bien
     *
     * @ORM\ManyToOne(targetEntity="Bien")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="bien_id", referencedColumnName="id")
     * })
     */
    private $bien;

    /**
     * Get the value of id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id.
     *
     * @param int $id
     *
     * @return self
     */
    public function setId(int $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of image.
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image.
     *
     * @param string $image
     *
     * @return self
     */
    public function setImage(string $image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get the value of bien.
     *
     * @return \Bien
     */
    public function getBien()
    {
        return $this->bien;
    }

    /**
     * Set the value of bien.
     *
     * @param \Bien $bien
     *
     * @return self
     */
    public function setBien(\Bien $bien)
    {
        $this->bien = $bien;

        return $this;
    }
}
