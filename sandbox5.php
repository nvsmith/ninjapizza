<?php

  // Public Classes
  class User {
    private $email;

    private $name;

    public function __construct($name, $email){
      // $this->email = 'mario@test.comm';
      // $this->name = 'mario';
      $this->email = $email;
      $this->name = $name;

    }

    public function login(){
      echo $this->name . ' logged in' . '<br />';
    }

    public function getName(){
      return $this->name;
    }

    public function setName($name){
      if (is_string($name) && strlen($name) > 1) {
        $this->name = $name;
        return "name has been updated to $name";
      } else {
        return 'not a valid name.';
      }
    }

  } // end class User

  // Instantiating the class
  // $userOne = new User();
  //
  // $userOne->login();
  // echo $userOne->name . '<br />';
  // echo $userOne->email . '<br />';

  $userTwo = new User('Yoshi', 'yoshi@test.comm');
  // echo $userTwo->getName();
  // echo $userTwo->setName(50);
  echo $userTwo->setName('Sean');


?>
