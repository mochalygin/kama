<?php
declare(strict_types=1);

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fren
 *
 * @ORM\Table
 * @ORM\Entity
 *
 * @ORM\HasLifecycleCallbacks()
 */
class Fren
{

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=255, unique=true)
     */
    protected $key;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birthdate", type="datetime")
     */
    protected $registeredAt;

    /**
     * Get Id
     *
     * @return integer
     */
    public function getId(): integer
    {
        return $this->id;
    }

    /**
     * Set key
     *
     * @param string $key
     *
     * @return Fren
     */
    public function setKey(string $key)
    {
        $this->key = $key;

        return $this;
    }

    /**
     * Get key
     *
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * Set registeredAt
     *
     * @ORM\PrePersist
     */
    public function setRegisteredAt()
    {
        $this->registeredAt = new \DateTime;
    }

    /**
     * Get registeredAt
     *
     * @return \DateTime
     */
    public function getRegisteredAt(): \DateTime
    {
        return $this->registeredAt;
    }

}