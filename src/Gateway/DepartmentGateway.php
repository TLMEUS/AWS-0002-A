<?php
/**
 * This file contains the src/Gateway/DepartmentGateway.php file for project AWS-0002-A.
 *
 * File information:
 * Project Name: AWS-0002-A
 * Section Name: Source
 * Module Name: Gateway
 * File Name: DepartmentGateway.php
 * File Author: Troy L. Marker
 * Language: PHP 8.3
 *
 * File Copyright: 06/29/2024
 */
declare(strict_types=1);

namespace Gateway;

use Root\AbstractGateway;

class DepartmentGateway extends AbstractGateway {

    public string $tableName = 'tbl_departments';

    public array $colNames = [
        'colName'
    ];
}