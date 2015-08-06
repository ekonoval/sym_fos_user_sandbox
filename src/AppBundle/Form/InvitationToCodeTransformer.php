<?php
namespace AppBundle\Form;

use AppBundle\Entity\Invitation;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\UnexpectedTypeException;

/**
 * Transforms an Invitation to an invitation code.
 */
class InvitationToCodeTransformer implements DataTransformerInterface
{
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function transform($value)
    {
        if (null === $value) {
            return null;
        }

        if (!$value instanceof Invitation) {
            throw new UnexpectedTypeException($value, 'AppBundle\Entity\Invitation');
        }

        return $value->getCode();
    }

    public function reverseTransform($value)
    {
        if (null === $value || '' === $value) {
            return null;
        }

        if (!is_string($value)) {
            throw new UnexpectedTypeException($value, 'string');
        }

        $code = $value; //!!

        $dql = <<<DQL
SELECT i
FROM AppBundle:Invitation i
WHERE i.code = :code
    AND NOT EXISTS(
        SELECT 1
        FROM AppBundle:EkvUser u
        WHERE
            u.invitation = i
    )
DQL;

        $res = $this->entityManager
            ->createQuery($dql)
            ->setParameter('code', $code)
            ->setMaxResults(1)
            ->getOneOrNullResult();

        return $res;
    }
}