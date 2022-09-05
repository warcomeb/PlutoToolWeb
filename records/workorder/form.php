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
session_start();

require_once (realpath(dirname(__FILE__).'/../../library/database.class.php'));
require_once (realpath(dirname(__FILE__).'/../../library/login.class.php'));

// Add project define
require_once (realpath(dirname(__FILE__).'/../../prjlibrary/prjdefine.php'));

// Config file
$config = parse_ini_file(realpath(dirname(__FILE__).'/../../config/config.ini'),true);

// Array to save response
$data = array();
// Status Value:
// 0 - OK
// 1 - DATABASE ERROR
$data['status'] = 0;
$data['error'] = "";

// Database object
$db = Database::getInstance($config['database']);

// Check if user is logged
list($status, $user) = Login::isLogged($db);

// When the user is logged, add the customer/supplier
// if ($status == MyError::_login_UserLogged)
// {
    if ($_POST['action'] == "add")
    {
        // Write the query
        // FIXME: timestamp is usefull?
        // FIXME: Log, is usefull?
        $query = "INSERT INTO " . PRJ_DB_TABLE_WORKORDER . " 
                (Id, Name, Description, StartDate, EndDate, Note) 
                VALUES (NULL, 
                '" . addslashes(stripslashes($_POST['name'])) . "',
                '" . addslashes(stripslashes($_POST['description'])) . "', 
                STR_TO_DATE('" . addslashes(stripslashes($_POST['start'])) . "','%d/%m/%Y'), 
                STR_TO_DATE('" . addslashes(stripslashes($_POST['end'])) . "','%d/%m/%Y'), 
                '" . addslashes(stripslashes($_POST['note'])) . "')";
        // run query
        $data['query'] = $query;
        $affectedRows = $db->exec($query);
        if ($affectedRows === 1)
        {
            $data['id'] = $db->lastInsertId();
            $data['status'] = 0;
        }
        else
        {
            $data['status'] = 1;
            $data['error'] = MyError::getErrorMessage(MyError::_WorkOrder_ErrorAddingNew);
        }
    }
    else if ($_POST['action'] == "edit")
    {
        // Write the query
        // FIXME: timestamp is usefull?
        // FIXME: Log, is usefull?
        $query = "UPDATE " . PRJ_DB_TABLE_WORKORDER . " SET
                 Name='" . addslashes(stripslashes($_POST['name'])) . "', 
                 Description='" . addslashes(stripslashes($_POST['description'])) . "', 
                 StartDate=STR_TO_DATE('" . addslashes(stripslashes($_POST['start'])) . "','%d/%m/%Y'), 
                 EndDate=STR_TO_DATE('" . addslashes(stripslashes($_POST['end'])) . "','%d/%m/%Y'), 
                 Note='" . addslashes(stripslashes($_POST['note'])) . "' 
                 WHERE Id={$_POST['id']}";

        $data['query'] = $query;
        $affectedRows = $db->exec($query);
        if ($affectedRows === 1)
        {
            $data['id'] = $_POST['id'];
            $data['status'] = 0;
        }
        else
        {
            $data['status'] = 1;
            $data['error'] = MyError::getErrorMessage(MyError::_WorkOrder_ErrorEdit);
        }
    }
// }
// else
// {
//     $data['status'] = 1;
//     $data['error'] = MyError::getErrorMessage($status);
// }
echo json_encode($data);