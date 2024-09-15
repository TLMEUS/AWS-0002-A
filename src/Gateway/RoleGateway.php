<?php
/**
 * This file contains the src/Gateway/RoleGateway.php file for project AWS-0002-A.
 *
 * File information:
 * Project Name: AWS-0002-A
 * Section Name: Source
 * Module Name: Gateway
 * File Name: RoleGateway.php
 * File Author: Troy L. Marker
 * Language: PHP 8.3
 *
 * File Copyright: 06/29/2024
 */
declare(strict_types=1);

namespace Gateway;

use Root\AbstractGateway;

class RoleGateway extends AbstractGateway {

    public string $tableName = 'tbl_roles';

    public array $colNames = [
        'colName'
    ];
}