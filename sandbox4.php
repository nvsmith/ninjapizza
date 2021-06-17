<?php

  // Public Classes
  class User {
    public $email;

    public $name;

    public function __construct($name, $email){
      // $this->email = 'mario@test.comm';
      // $this->name = 'mario';
      $this->email = $email;
      $this->name = $name;

    }

    public function login(){
      echo $this->name . ' logged in' . '<br />';
    }
  }

  // Instantiating the class
  // $userOne = new User();
  //
  // $userOne->login();
  // echo $userOne->name . '<br />';
  // echo $userOne->email . '<br />';

  $userTwo = new User('Yoshi', 'yoshi@test.comm');
  // echo $userTwo->name;
  // echo $userTwo->email;
  $userTwo->login();


?>
