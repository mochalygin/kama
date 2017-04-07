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
     *
     * @todo а нужно ли это поле? оно позволяет спалить кто кому пишет. с другой стороны, если у тебя есть контроль над Камой -- ты и так знаешь
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
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    protected $createdAt;

    /**
     * @var string
     *
     * @ORM\Column(name="crypted_data", type="text")
     */
    protected $cryptedData;

    /**
     * @var string
     *
     * @ORM\Column(name="sign", type="string")
     */
    protected $sign;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_delivered", type="boolean", nullable=false)
     */
    protected $isDelivered = false;

    /**
     * Set uuid
     *
     * @param string $uuid
     *
     * @return Message
     */
    public function setUuid(string $uuid)
    {
        $this->uuid = $uuid;

        return $this;
    }

    /**
     * Get uuid
     *
     * @return string
     */
    public function getUuid(): string
    {
        return $this->uuid;
    }

    /**
     * @ORM\PrePersist
     * Set createdAt
     */
    public function setCreatedAt()
    {
        $this->createdAt = new \DateTime;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
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
    public function getFrom(): Fren
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
    public function getTo(): Fren
    {
        return $this->to;
    }

    /**
     * Set cryptedData
     *
     * @param string $cryptedData
     *
     * @return Message
     */
    public function setCryptedData(string $cryptedData)
    {
        $this->cryptedData = $cryptedData;

        return $this;
    }

    /**
     * Get cryptedData
     *
     * @return string
     */
    public function getCryptedData(): string
    {
        return $this->cryptedData;
    }

    /**
     * Set sign
     *
     * @param string $sign
     *
     * @return Message
     */
    public function setSign(string $sign)
    {
        $this->sign = $sign;

        return $this;
    }

    /**
     * Get sign
     *
     * @return string
     */
    public function getSign(): string
    {
        return $this->sign;
    }

    /**
     * Set isDelivered
     *
     * @param boolean $isDelivered
     *
     * @return Message
     */
    public function setIsDelivered(bool $isDelivered)
    {
        $this->isDelivered = $isDelivered;

        return $this;
    }

    /**
     * Get isDelivered
     *
     * @return boolean
     */
    public function getIsDelivered(): bool
    {
        return $this->isDelivered;
    }
}
