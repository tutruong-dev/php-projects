<?php
class User
{
  public $user_id;
  public $username;
  public $firstname;
  public $lastname;
  public $password_input;
  public $password_check;
  public $primary_email;


  public function __construct($user_id, $username, $firstname, $lastname, $password_input, $password_check, $primary_email)
  {
    $this->user_id = $user_id;
    $this->username = $username;
    $this->firstname = $firstname;
    $this->lastname = $lastname;
    $this->password_input = $password_input;
    $this->password_check = $password_check;
    $this->primary_email = $primary_email;
  }

  public function getUser_id()
  {
    return $this->user_id;
  }

  public function setUser_id($user_id)
  {
    $this->user_id = $user_id;
  }

  public function getUsername()
  {
    return $this->username;
  }

  public function setUsername($username)
  {
    $this->username = $username;
  }

  public function getFirstname()
  {
    return $this->firstname;
  }


  public function setFirstname($firstname)
  {
    $this->firstname = $firstname;
  }

  public function getLastname()
  {
    return $this->lastname;
  }


  public function setLastname($lastname)
  {
    $this->lastname = $lastname;
  }


  public function getPassword_input()
  {
    return $this->password_input;
  }

  public function setPassword_input($password_input)
  {
    $this->password_input = $password_input;
  }

  public function getPassword_check(
  )
  {
    return $this->password_check;
  }


  public function setPassword_check($password_check)
  {
    $this->password_check = $password_check;
  }

  public function getPrimary_email()
  {
    return $this->primary_email;
  }

  public function setPrimary_email($primary_email)
  {
    $this->primary_email = $primary_email;
  }

  public function fullName()
  {
    return $this->firstname . ' ' . $this->lastname;
  }
}
