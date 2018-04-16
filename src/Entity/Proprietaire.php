<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Proprietaire.
 *
 * @ORM\Table(name="proprietaire", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_69E399D6E7927C74", columns={"email"}), @ORM\UniqueConstraint(name="UNIQ_69E399D6D0373BDA", columns={"codeBanque"}), @ORM\UniqueConstraint(name="UNIQ_69E399D6289172D6", columns={"numpiece"})})
 * @ORM\Entity
 */
class Proprietaire
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
     * @var string|null
     *
     * @ORM\Column(name="numpiece", type="string", length=50, nullable=true)
     */
    private $numpiece;

    /**
     * @var string
     *
     * @ORM\Column(name="nomComplet", type="string", length=50, nullable=false)
     */
    private $nomcomplet;

    /**
     * @var string|null
     *
     * @ORM\Column(name="adresse", type="string", length=50, nullable=true)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="tel", type="string", length=20, nullable=false)
     */
    private $tel;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="codeBanque", type="string", length=255, nullable=false)
     */
    private $codebanque;

    /**
     * @var string|null
     *
     * @ORM\Column(name="password", type="string", length=50, nullable=true)
     */
    private $password;

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
     * Get the value of numpiece.
     *
     * @return string|null
     */
    public function getNumpiece()
    {
        return $this->numpiece;
    }

    /**
     * Set the value of numpiece.
     *
     * @param string|null $numpiece
     *
     * @return self
     */
    public function setNumpiece($numpiece)
    {
        $this->numpiece = $numpiece;

        return $this;
    }

    /**
     * Get the value of nomcomplet.
     *
     * @return string
     */
    public function getNomcomplet()
    {
        return $this->nomcomplet;
    }

    /**
     * Set the value of nomcomplet.
     *
     * @param string $nomcomplet
     *
     * @return self
     */
    public function setNomcomplet(string $nomcomplet)
    {
        $this->nomcomplet = $nomcomplet;

        return $this;
    }

    /**
     * Get the value of adresse.
     *
     * @return string|null
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set the value of adresse.
     *
     * @param string|null $adresse
     *
     * @return self
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get the value of tel.
     *
     * @return string
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set the value of tel.
     *
     * @param string $tel
     *
     * @return self
     */
    public function setTel(string $tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get the value of email.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email.
     *
     * @param string $email
     *
     * @return self
     */
    public function setEmail(string $email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of codebanque.
     *
     * @return string
     */
    public function getCodebanque()
    {
        return $this->codebanque;
    }

    /**
     * Set the value of codebanque.
     *
     * @param string $codebanque
     *
     * @return self
     */
    public function setCodebanque(string $codebanque)
    {
        $this->codebanque = $codebanque;

        return $this;
    }

    /**
     * Get the value of password.
     *
     * @return string|null
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password.
     *
     * @param string|null $password
     *
     * @return self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }
}
