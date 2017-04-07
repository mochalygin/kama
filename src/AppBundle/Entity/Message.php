<?php
declare(strict_types=1);

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Fren;

/**
 * Message
 *
 * @ORM\Table
 * @ORM\Entity
 *
 * @ORM\HasLifecycleCallbacks()
 */
class Message
{
    /**
     * @var string
     *
     * @ORM\Column(name="uuid", type="string", length=36, unique=true)
     * @ORM\Id
     */
    protected $uuid;

    /**
     * @var Fren
     *
     * @ORM\ManyToOne(targetEntity="Fren")
     * @ORM\JoinColumn(name="from_id", referencedColumnName="id", nullable=false)
     */
    protected $from;

    /**
     * @var Fren
     *
     * @ORM\ManyToOne(targetEntity="Fren")
     * @ORM\JoinColumn(name="to_id", referencedColumnName="id", nullable=false)
     */
    protected $to;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birthdate", type="datetime", nullable=false)
     */
    protected $registeredAt;


    /**
     * Set uuid
     *
     * @param string $uuid
     *
     * @return Message
     */
    public function setUuid($uuid)
    {
        $this->uuid = $uuid;

        return $this;
    }

    /**
     * Get uuid
     *
     * @return string
     */
    public function getUuid()
    {
        return $this->uuid;
    }

    /**
     * @ORM\PrePersist
     * Set registeredAt
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
    public function getRegisteredAt()
    {
        return $this->registeredAt;
    }

    /**
     * Set from
     *
     * @param Fren $from
     *
     * @return Message
     */
    public function setFrom(Fren $from)
    {
        $this->from = $from;

        return $this;
    }

    /**
     * Get from
     *
     * @return Fren
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * Set to
     *
     * @param Fren $to
     *
     * @return Message
     */
    public function setTo(Fren $to)
    {
        $this->to = $to;

        return $this;
    }

    /**
     * Get to
     *
     * @return Fren
     */
    public function getTo()
    {
        return $this->to;
    }
}
