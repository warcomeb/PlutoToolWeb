<?php
/*
 * This file is part of PlutoTool Project
 * Copyright (C) 2022 Marco Giammarini
 *
 * Author(s):
 *  Marco Giammarini <m.giammarini@warcomeb.it>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>
 */
// Session starting...
session_start();

require_once '../../library/database.class.php';
require_once '../../library/login.class.php';
require_once '../../library/myerror.class.php';
require_once '../../library/myutility.class.php';

// Config file
$config = parse_ini_file(__DIR__ . '/../../config/config.ini',true);

// Create database object
$db = Database::getInstance($config['database']);

// Check if user is logged
list($status, $user) = Login::isLogged($db);

// When the user is logged, serve the request
//if ($status == MyError::_login_UserLogged)
{
    include '../../views/header.phtml';
    include '../../views/sidebar.phtml';

    $type = "list";

    // Page contents...
    if (!isset($_GET['action']) || ($_GET['action'] == 'list'))
    {
        include 'list.phtml';
    }
    else if (isset($_GET['action']) && ($_GET['action'] == 'add') && !isset($_GET['id']))
    {
        $type = "add";
        include 'element.phtml';
    }
    else if (isset($_GET['action']) && ($_GET['action'] == 'edit') && isset($_GET['id']))
    {
        $type = "edit";
        include 'element.phtml';
    }
    else if (isset($_GET['action']) && ($_GET['action'] == 'view') && isset($_GET['id']))
    {
        $type = "view";
        include 'element.phtml';
    }
    else
    {
        // TODO ??
        echo "porco dio";
    }

    include '../../views/footer.phtml';
    include 'script.phtml';
}
// else
// {
//     header("location: /login.php");
//     exit;
// }