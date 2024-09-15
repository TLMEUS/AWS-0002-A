<?php
/**
 * This file contains the src/UserAccessController.php file for project AWS-0002-A.
 *
 * File information:
 * Project Name: AWS-0002-A
 * Section Name: Source
 * Module Name: Controller
 * File Name: UserAccessController.php
 * File Author: Troy L. Marker
 * Language: PHP 8.3
 *
 * File Copyright: 06/29/2024
 *
 * @noinspection ALL
 */
declare(strict_types=1);

namespace Controller;

use Root\AbstractController;
use Gateway\UserGateway;

class UserController extends AbstractController
{
    /**
     * Class constructor.
     *
     * @param UserGateway $gateway The gateway object to be used by the class.
     * @return void
     */
    public function __construct(public UserGateway $gateway) {
    }


}