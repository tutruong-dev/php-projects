<?php
class User {
    private $userID;
    private $userName;
    private $firstName;
    private $lastName;
    private $passwordInput;
    private $passwordCheck;
    private $primaryEmail;

    // Constructor
    public function __construct($userID, $userName, $firstName, $lastName, $passwordInput, $passwordCheck, $primaryEmail) {
        $this->userID = $userID;
        $this->userName = $userName;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->passwordInput = $passwordInput;
        $this->passwordCheck = $passwordCheck;
        $this->primaryEmail = $primaryEmail;
    }

    // Getter and Setter methods
    public function getUserID() {
        return $this->userID;
    }

    public function setUserID($userID) {
        $this->userID = $userID;
    }

    public function getUserName() {
        return $this->userName;
    }

    public function setUserName($userName) {
        $this->userName = $userName;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function setLastName($lastName) {
        $this->lastName = $lastName;
    }

    public function getPasswordInput() {
        return $this->passwordInput;
    }

    public function setPasswordInput($passwordInput) {
        $this->passwordInput = $passwordInput;
    }

    public function getPasswordCheck() {
        return $this->passwordCheck;
    }

    public function setPasswordCheck($passwordCheck) {
        $this->passwordCheck = $passwordCheck;
    }

    public function getPrimaryEmail() {
        return $this->primaryEmail;
    }

    public function setPrimaryEmail($primaryEmail) {
        $this->primaryEmail = $primaryEmail;
    }

    // Method to get full name
    public function fullName() {
        return $this->firstName . " " . $this->lastName;
    }
}
?>
