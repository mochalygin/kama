<?php
declare(strict_types=1);

namespace AppBundle\Service;


use Doctrine\ORM\EntityManager;
use AppBundle\Entity\Fren;

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
        $fren = $this->em->getRepository(Fren::class)->find($key);
        if ( $fren ) {
            throw new \Exception('Fren with key ' . $key . ' already registered at this Kama');
        }

        $fren = new Fren;
        $fren->setKey($key);

        $this->em->persist($fren);
        $this->em->flush();

        return true;
    }

}
