<?php
/**
 * Created by: DotKernel Team
 * User: gabidjdev
 * Date: 2019-01-30
 * Time: 17:58
 */

namespace Dot\User\Mapper;

use Doctrine\ORM\EntityManager;
use Dot\Hydrator\ClassMethodsCamelCase;
use Dot\Mapper\Entity\EntityInterface;
use Dot\User\Entity\UserEntity;
use Zend\Hydrator\HydratorInterface;

class UserDoctrineMapper implements UserMapperInterface
{
    const USER_ENTITY = UserEntity::class;

    protected $entityManager;
    protected $inTransaction = false;

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
        $this->entityManager->beginTransaction();
    }

    public function inTransaction(): bool
    {
        return $this->entityManager->getConnection()->isTransactionActive();
    }

    public function commit()
    {
        $this->entityManager->commit();
    }

    public function rollback()
    {
        $this->entityManager->rollback();
    }

    public function lastGeneratedValue(string $name = null)
    {
        return $this->entityManager->getConnection()->lastInsertId($name);
    }

    public function quoteIdentifier($identifier): string
    {
        // TODO: Implement quoteIdentifier() method.
    }

    public function getPrimaryKey(): array
    {
        return $this->entityManager->getClassMetadata(self::USER_ENTITY)->getIdentifierColumnNames();
    }

    public function getColumns(): array
    {
        return $this->entityManager->getClassMetadata(self::USER_ENTITY)->getColumnNames();
    }

    public function getPrototype(): EntityInterface
    {
        return new UserEntity();
    }

    public function getHydrator(): HydratorInterface
    {
        return new ClassMethodsCamelCase();
    }

    public function quoteValue($value): string
    {
        $this->entityManager->getConnection()->quote($value);
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
        //$primaryKeyName = $this->entityManager->getClassMetadata(self::USER_ENTITY)->getSingleIdentifierFieldName();
        $primaryKeyName = $this->entityManager->getClassMetadata(self::USER_ENTITY)->getSingleIdentifierColumnName();

        $orderBy = $options['order'] ?? null;
        $user = $this->entityManager->getRepository(self::USER_ENTITY)->findOneBy([$primaryKeyName=> $primaryKey], $orderBy);
        if ($user instanceof UserEntity) {
            return $user;
        }
        return null;
    }

    public function save(EntityInterface $entity, array $options = [])
    {
        if ($options) {
            throw new \Exception('options not implemented');
        }
        return $this->entityManager->persist($entity);
    }

    public function delete(EntityInterface $entity, array $options = [])
    {
        if ($options) {
            throw new \Exception('options not implemented');
        }
        $this->entityManager->remove($entity);
        $this->entityManager->flush();
    }

    public function updateAll(array $fields, array $conditions)
    {
        throw new \Exception('options not implemented');
    }

    public function deleteAll(array $conditions)
    {
        throw new \Exception('options not implemented');
    }

    public function newEntity(): EntityInterface
    {
        return new UserEntity();
    }


}
