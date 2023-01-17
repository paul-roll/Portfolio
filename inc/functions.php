<?php

function validateName($string)
{
    if (empty($string)) {
        return "Your Name is required.";
      //Must use only letters hyphen, apostrophe and space
      } else if (!preg_match("/^[a-zA-Z-']*$/", $string)) {
        return "Your Name contains invalid characters.";
      //Must be at most 35 characters (DB limit)
      } else if (strlen($string) > 35) {
        return "Your Name is too long.";
      //Must be at least 2 characters
      } else if (strlen($string) < 2) {
        return "Your Name is too short.";
      //Must start and end with a letter
      } else if (!preg_match("/^(?!.*--|.*'')[a-zA-Z]{1}[a-zA-Z-']*[a-zA-Z]{1}$/", $string)) {
        return "Your Name is invalid.";
      } else {
        return false;
      }
}

function validateEmail($email)
{
    if (empty($email)) {
        return "Your Email is required.";
        //Keeping "a-zA-Z" instead of "a-z" in-case strtolower() is removed
        //Only alphanumeric, hyphen, period and AT characters
    } else if (!preg_match("/^[a-zA-Z0-9-!#$%&'*+.\/=?@^_`{|}~]*$/", $email)) {
        return "Your Email contains invalid characters.";
        //At most 254 characters (DB limit)
    } else if (strlen($email) > 254) {
        return "Your Email is invalid.";
        // Far from perfect, catches the general format of emails
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "Your Email is invalid.";
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
        return "Your Telephone Number contains invalid characters.";
    //At most 11 characters (change to 12 to support country code) (12 = DB limit)
    } else if (strlen($phone) > 12) {
        return "Your Telephone Number is too long.";
    //At least 11 characters
    } else if (strlen($phone) < 11) {
        return "Your Telephone Number is too short.";
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
      //Must be at least 2 characters
      } else if (strlen($string) < 2) {
        return "Subject is too short.";
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