<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Client.
 *
 * @ORM\Table(name="client", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_C7440455289172D6", columns={"numpiece"})})
 * @ORM\Entity
 */
class Client
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
     * @var int|null
     *
     * @ORM\Column(name="numpiece", type="integer", nullable=true)
     */
    private $numpiece;

    /**
     * @var string
     *
     * @ORM\Column(name="nomComplet", type="string", length=255, nullable=false)
     */
    private $nomcomplet;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tel", type="string", length=30, nullable=true)
     */
    private $tel;

    /**
     * @var string|null
     *
     * @ORM\Column(name="adress", type="string", length=255, nullable=true)
     */
    private $adress;

    /**
     * @var string|null
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @var string|null
     *
     * @ORM\Column(name="motdepasse", type="string", length=255, nullable=true)
     */
    private $motdepasse;
}
