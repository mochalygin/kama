<?php
declare(strict_types=1);

namespace AppBundle\Service;


use Doctrine\ORM\EntityManager;
use AppBundle\Entity\Fren;
use AppBundle\Entity\Message;

/**
 * @author mochalygin
 */
class Kama
{

    /**
     * @var EntityManager
     */
    protected $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * @return bool
     */
    public function ping()
    {
        return true;
    }

    /**
     * @param string $key
     */
    public function registerFren(string $key): bool
    {
        $fren = $this->em->getRepository(Fren::class)->findOneByKey($key);
        if ( $fren ) {
            throw new \Exception('Fren with key ' . $key . ' already registered at this Kama');
        }

        $fren = new Fren;
        $fren->setKey($key);

        $this->em->persist($fren);
        $this->em->flush();

        return true;
    }

    /**
     *
     * @param string $fromKey
     * @param string $toKey
     * @param string $uuid
     * @param string $cryptedData
     * @param string $sign
     *
     * @return bool
     *
     * @throws \Exception
     */
    public function addMessage(string $fromKey, string $toKey, string $uuid, string $cryptedData, string $sign): bool
    {
        if ($this->em->getRepository(Message::class)->find($uuid)) {
            throw new \Exception('Message with UUID ' . $uuid . ' already exists');
        }

        $fromFren = $this->em->getRepository(Fren::class)->findOneByKey($fromKey);
        if (! $fromFren) {
            throw new \Exception('This Kama do not know Fren(from) with key: ' . $fromKey);
        }

        $toFren = $this->em->getRepository(Fren::class)->findOneByKey($toKey);
        if (! $toFren) {
            throw new \Exception('This Kama do not know Fren(to) with key: ' . $toKey);
        }

        if (strlen($uuid) != 36) {
            throw new \Exception('Message UUID must have 36 digits length');
        }

        if (! $this->checkSign($fromKey, $uuid . $cryptedData, $sign)) {
            throw new \Exception('Bad sign(' . $sign . ') for key(' . $fromKey . '), message(' . $uuid . '): ' . $cryptedData);
        }

        $message = new Message;
        $message->setFrom($fromFren)
                ->setTo($toFren)
                ->setUuid($uuid)
                ->setCryptedData($cryptedData)
                ->setSign($sign);
        $this->em->persist($message);
        $this->em->flush();

        return true;
    }

    /**
     * @param string $key
     * @param string $signedString
     * @param string $sign
     *
     * @retrun bool
     * @todo implement
     */
    protected function checkSign(string $key, string $signedString, string $sign): bool
    {
        return true;
    }


}
