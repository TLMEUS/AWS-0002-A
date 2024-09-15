<?php
/**
 * This file contains the src/Gateway/RoleAccessGateway.php file for project AWS-0002-A.
 *
 * File information:
 * Project Name: AWS-0002-A
 * Section Name: Source
 * Module Name: Gateway
 * File Name: RoleAccessGateway.php
 * File Author: Troy L. Marker
 * Language: PHP 8.3
 *
 * File Copyright: 06/29/2024
 */
declare(strict_types=1);

namespace Gateway;

use Root\AbstractGateway;

/**
 * A class representing the role access gateway.
 */
class RoleAccessGateway extends AbstractGateway {

    public string $tableName = 'tbl_role_access';

    public array $colNames = [
        'colDepartment',
        'colRole',
        'colApplication',
        'colAccess'
    ];
}