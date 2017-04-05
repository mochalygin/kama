<?php
declare(strict_types=1);

namespace AppBundle\Service;


use Doctrine\ORM\EntityManager;

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
     * @param string $key
     */
    public function registerFren(string $key)
    {
        $fren = $this->em->getRepository(Fren::class)->find($key);
        if ( $fren ) {
            throw new \Exception('Fren with key ' . $key . ' already registered at this Kama');
        }
        
        $fren = Fren::create()
                ->setKey($key)
                ->setRegisteredAt(new \DateTime());
        $this->em->persist($fren);
        $this->em->flush();
        
        return true;
    }
}
