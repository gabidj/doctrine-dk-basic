<?php
/**
 * @see https://github.com/dotkernel/dot-authorization/ for the canonical source repository
 * @copyright Copyright (c) 2017 Apidemia (https://www.apidemia.com)
 * @license https://github.com/dotkernel/dot-authorization/blob/master/LICENSE.md MIT License
 */

declare(strict_types = 1);

namespace Dot\Authorization\Role;

/**
 * Interface RoleInterface
 * @package Dot\Authorization\Role
 */
interface RoleInterface
{
    /**
     * @return string
     */
    public function getName(): string;
}
