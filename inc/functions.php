<?php

function validateName($string, $token)
{
    if (empty($string)) {
        return $token . " Name is required.";
      //Must use only letters hyphen, apostrophe and space
      } else if (!preg_match("/^[a-zA-Z-']*$/", $string)) {
        return $token . " Name contains invalid characters.";
      //Must be at most 35 characters (DB limit)
      } else if (strlen($string) > 35) {
        return $token . " Name is too long.";
      //Must be at least 2 characters
      } else if (strlen($string) < 2) {
        return $token . " Name is too short.";
      //Must start and end with a letter
      } else if (!preg_match("/^(?!.*--|.*'')[a-zA-Z]{1}[a-zA-Z-']*[a-zA-Z]{1}$/", $string)) {
        return $token . " Name is invalid.";
      } else {
        return false;
      }
}

function validateEmail($email)
{
    if (empty($email)) {
        return "Email Address is required.";
        //Keeping "a-zA-Z" instead of "a-z" in-case strtolower() is removed
        //Only alphanumeric, hyphen, period and AT characters
    } else if (!preg_match("/^[a-zA-Z0-9-!#$%&'*+.\/=?@^_`{|}~]*$/", $email)) {
        return "Email Address contains invalid characters.";
        //At most 254 characters (DB limit)
    } else if (strlen($email) > 254) {
        return "Email Address is invalid.";
        // Far from perfect, catches the general format of emails
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "Email Address is invalid.";
    } else {
        return false;
    }
}

function validatePhone($phone)
{
    if (empty($phone)) {
        return false;
    //Only numbers
    } else if (!preg_match("/^[0-9]*$/", $phone)) {
        return "Phone Number contains invalid characters.";
    //At most 11 characters (change to 12 to support country code) (12 = DB limit)
    } else if (strlen($phone) > 12) {
        return "Phone Number is too long.";
    //At least 11 characters
    } else if (strlen($phone) < 11) {
        return "Phone Number is too short.";
    } else {
        return false;
    }
}

function validateSubject($string)
{
    if (empty($string)) {
        return false;
      //Must be at most 35 characters (DB limit)
      } else if (strlen($string) > 254) {
        return "Subject is too long.";
      } else {
        return false;
      }
}

function validateMessage($message)
{
    if (empty($message)) {
        return "Message is required.";
    } else if (strlen($message) < 5) {
        return "Message is too short.";
    } else {
        return false;
    }
}
