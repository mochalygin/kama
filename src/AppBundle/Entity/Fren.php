<?php
declare(strict_types=1);

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fren
 *
 * @ORM\Table(name="fren")
 * @ORM\Entity
 * 
 * @ORM\HasLifecycleCallbacks() 
 */
class Fren
{
    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=255, unique=true)
     * @ORM\Id
     */
    protected $key;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birthdate", type="datetime")
     */
    protected $registeredAt;

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