<?php
/**
 * see https://github.com/dotkernel/dot-user/ for the canonical source repository
 * copyright Copyright (c) 2017 Apidemia (https://www.apidemia.com)
 * license https://github.com/dotkernel/dot-user/blob/master/LICENSE.md MIT License
 */

namespace Dot\User\Entity;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityRepository;
use Dot\Authentication\Identity\IdentityInterface as AuthenticationIdentity;
use Dot\Authorization\Identity\IdentityInterface as AuthorizationIdentity;
use Doctrine\ORM\Mapping as ORM;
use Dot\User\Entity\UserEntity as User;
use Dot\User\Entity\RoleEntity as Role;
// use Dot\Mapper\Entity\Entity;

class RoleEntityRepository extends EntityRepository
{
    //
}
