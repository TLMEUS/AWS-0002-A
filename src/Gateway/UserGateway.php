<?php
/**
 * This file contains the src/Gateway/UserGateway.php file for project AWS-0002-A.
 *
 * File information:
 * Project Name: AWS-0002-A
 * Section Name: Source
 * Module Name: Gateway
 * File Name: UserGateway.php
 * File Author: Troy L. Marker
 * Language: PHP 8.3
 *
 * File Copyright: 06/29/2024
 */
declare(strict_types=1);

namespace Gateway;

use Root\AbstractGateway;
use PDO;

class UserGateway extends AbstractGateway {

    public string $tableName = 'tbl_users';

    public array $colNames = [
        'colName',
        'colPassword',
        'colDepartment',
        'colRole'
    ];

    public function create(array $data): array
    {
        $fields = [];
        $sql = 'INSERT INTO ' . $this->tableName . ' (' . implode(', ', $this->colNames) . ') VALUES (:' . implode(', :', $this->colNames) . ')';
        $stmt = $this->conn->prepare($sql);
        foreach ($this->colNames as $colName) {
            //$fields[$colName] = [$data[$colName], PDO::PARAM_STR];
            $fields[$colName] = [$data[$colName]];
        }
        $fields['colPassword'] = password_hash($data['colPassword'], algo: PASSWORD_DEFAULT);
        foreach ($fields as $name => $values) {
            $stmt->bindValue(param: ":$name", value: $values[0]);
        }
        $stmt->bindValue(param: ":colPassword", value:password_hash(password: "NewHire", algo: PASSWORD_DEFAULT));
        $stmt->execute();
        return $this->getAll();
    }
}