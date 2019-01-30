<?php
/**
 * Created by: DotKernel Team
 * User: gabidjdev
 * Date: 2019-01-30
 * Time: 17:58
 */

namespace Dot\User\Mapper;

use Doctrine\ORM\EntityManager;
use Dot\Mapper\Entity\EntityInterface;
use Dot\User\Entity\UserEntity;
use Zend\Hydrator\HydratorInterface;

class UserDoctrineMapper implements UserMapperInterface
{
    const USER_ENTITY = UserEntity::class;

    protected $entityManager;

    /**
     * UserDoctrineMapper constructor.
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getByEmail(string $email, array $options = []): ?UserEntity
    {
        $orderBy = $options['order'] ?? null;
        $user = $this->entityManager->getRepository(self::USER_ENTITY)->findOneBy(['email' => $email], $orderBy);
        if ($user instanceof UserEntity) {
            return $user;
        }
        return null;
    }

    public function beginTransaction()
    {
        // TODO: Implement beginTransaction() method.
    }

    public function inTransaction(): bool
    {
        // TODO: Implement inTransaction() method.
    }

    public function commit()
    {
        // TODO: Implement commit() method.
    }

    public function rollback()
    {
        // TODO: Implement rollback() method.
    }

    public function lastGeneratedValue(string $name = null)
    {
        // TODO: Implement lastGeneratedValue() method.
    }

    public function quoteIdentifier($identifier): string
    {
        // TODO: Implement quoteIdentifier() method.
    }

    public function getPrimaryKey(): array
    {
        // TODO: Implement getPrimaryKey() method.
    }

    public function getColumns(): array
    {
        // TODO: Implement getColumns() method.
    }

    public function getPrototype(): EntityInterface
    {
        // TODO: Implement getPrototype() method.
    }

    public function getHydrator(): HydratorInterface
    {
        // TODO: Implement getHydrator() method.
    }

    public function quoteValue($value): string
    {
        // TODO: Implement quoteValue() method.
    }

    public function find(string $type, array $options = []): array
    {
        // TODO: Implement find() method.
    }

    public function count(string $type, array $options = []): int
    {
        // TODO: Implement count() method.
    }

    public function get($primaryKey, array $options = [])
    {
        // TODO: Implement get() method.
    }

    public function save(EntityInterface $entity, array $options = [])
    {
        // TODO: Implement save() method.
    }

    public function delete(EntityInterface $entity, array $options = [])
    {
        // TODO: Implement delete() method.
    }

    public function updateAll(array $fields, array $conditions)
    {
        // TODO: Implement updateAll() method.
    }

    public function deleteAll(array $conditions)
    {
        // TODO: Implement deleteAll() method.
    }

    public function newEntity(): EntityInterface
    {
        // TODO: Implement newEntity() method.
    }


}
