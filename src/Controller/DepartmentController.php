<?php
/**
 * This file contains the src/DepartmentController.php file for project AWS-0002-A.
 *
 * File information:
 * Project Name: AWS-0002-A
 * Section Name: Source
 * Module Name: Controller
 * File Name: DepartmentController.php
 * File Author: Troy L. Marker
 * Language: PHP 8.3
 *
 * File Copyright: 06/29/2024
 *
 * @noinspection ALL
 */
declare(strict_types=1);

namespace Controller;

use Gateway\DepartmentGateway;
use Root\AbstractController;

class DepartmentController extends AbstractController {

    /**
     * Class constructor.
     *
     * @param DepartmentGateway $gateway The gateway object to be used by the class.
     * @return void
     */
    public function __construct(public DepartmentGateway $gateway) {
    }
}