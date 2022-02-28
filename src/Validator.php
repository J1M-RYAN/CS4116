<?php

class Validator
{

    public static function escape($input)
    {
        $input = trim($input); // remove spaces
        $input = stripcslashes($input); // remove slahses
        $input = htmlentities($input, ENT_QUOTES); //encodes quotes to prevent code injection
        return $input;
    }

    public static function isValidEmail($email)
    {
        return !!filter_var($email, FILTER_VALIDATE_EMAIL);
    }
}
