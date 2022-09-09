<?php
/*
 * This file is part of WarcomebPHP Library!
 * Copyright (C) 2018-2019 Marco Giammarini
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
 * 
 * Version:
 *  1.0.0 - 20190424 - First release
 */

class MyError
{
    /**
     * 
     */
    const _login_UserLogged = 100;
    
    /**
     *
     */
    const _login_UserNotLogged = 101;
    
    /**
     *
     */
    const _login_NewUser = 102;
    
    /**
     * 
     */
    const _login_NoCoockie = 103;
    
    /**
     *
     */
    const _login_HackerTry = 104;
    
    /**
     *
     */
    const _login_SessionExpired = 105;
    
    /**
     *
     */
    const _login_DatabaseError = 106;
    
    /**
     *
     */
    const _login_DataError = 107;
    
    /**
     *
     */
    const _login_UserLoggedIn = 108;
    
    /**
     *
     */
    const _login_UserLoggedOut = 109;
    
    /**
     *
     */
    const _login_UserNotActive = 110;
    
    /**
     *
     */
    const _login_WrongPassword = 111;
    
    /**
     *
     */
    const _login_EmptyData = 112;

    const _Account_NewAdded            = 200;
    const _Account_ErrorCreateCode     = 201;
    const _Account_ErrorAddingNew      = 202;
    const _Account_ErrorEdit           = 203;

    const _Payee_NewAdded              = 300;
    const _Payee_ErrorCreateCode       = 301;
    const _Payee_ErrorAddingNew        = 302;
    const _Payee_ErrorEdit             = 303;

    const _WorkOrder_NewAdded          = 400;
    const _WorkOrder_ErrorCreateCode   = 401;
    const _WorkOrder_ErrorAddingNew    = 402;
    const _WorkOrder_ErrorEdit         = 403;

    const _Transaction_NewAdded        = 500;
    const _Transaction_ErrorAddingNew  = 501;

    const _Vehicle_NewAdded            = 600;
    const _Vehicle_ErrorAddingNew      = 601;
    const _Vehicle_ErrorEdit           = 602;


    /**
     * This function return a error message for each error code.
     *
     * @param int $code The error code
     * @return string A string with the relative error message.
     */
    public static function getErrorMessage($code)
    {
        switch ($code)
        {
        case self::_login_EmptyData:
            return "ERR[".self::_login_EmptyData."] Username e/o password vuoti.";
        case self::_Account_ErrorCreateCode:
            return "ERR[".self::_Account_ErrorCreateCode."] Can't create account code.";
        case self::_Account_ErrorAddingNew:
            return "ERR[".self::_Account_ErrorAddingNew."] Can't add new account.";
        case self::_Account_ErrorEdit:
            return "ERR[".self::_Account_ErrorEdit."] Can't edit account.";
        case self::_Payee_ErrorCreateCode:
            return "ERR[".self::_Payee_ErrorCreateCode."] Can't create payee code.";
        case self::_Payee_ErrorAddingNew:
            return "ERR[".self::_Payee_ErrorAddingNew."] Can't add new payee.";
        case self::_Payee_ErrorEdit:
            return "ERR[".self::_Payee_ErrorEdit."] Can't edit payee.";
        case self::_WorkOrder_ErrorCreateCode:
            return "ERR[".self::_WorkOrder_ErrorCreateCode."] Can't create work order code.";
        case self::_WorkOrder_ErrorAddingNew:
            return "ERR[".self::_WorkOrder_ErrorAddingNew."] Can't add new work order.";
        case self::_WorkOrder_ErrorEdit:
            return "ERR[".self::_WorkOrder_ErrorEdit."] Can't edit work order.";
        case self::_Transaction_ErrorAddingNew:
            return "ERR[".self::_Transaction_ErrorAddingNew."] Can't add new transaction.";
        case self::_Vehicle_ErrorAddingNew:
            return "ERR[".self::_Vehicle_ErrorAddingNew."] Impossibile aggiungere un nuovo veicolo.";
        case self::_Vehicle_ErrorEdit:
            return "ERR[".self::_Vehicle_ErrorEdit."] Impossibile modificare il veicolo.";
        default:
            return "ERR[0000] Errore non codificato!";
        }
    }
}