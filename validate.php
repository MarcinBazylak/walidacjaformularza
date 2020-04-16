<?php

class validateUser {

   private $data;
   private $errors = [];
   private static $fields = ['username', 'email'];

   public function __construct($post_data) {
      $this->data = $post_data;
   }

   public function validateForm() {
      foreach(self::$fields as $field) {
         if(!array_key_exists($field, $this->data)) {
            trigger_error("Brak $field w tablicy danych.");
            return;
         }
      }

      $this->validateUsername();
      $this->validateEmail();
      return $this->errors;

   }

   private function validateUsername() {

      $val = trim($this->data['username']);
      if(empty($val)){
         $this->addError('username', 'Pole nazwa użytkownika nie może być puste.');
      } else {
         if(!preg_match('/^[a-zA-Z0-9]{6,12}$/', $val)) {
            $this->addError('username', 'Nazwa użytkownika powinna mieć 6 - 12 znaków i składać się tylko z liter i cyfr.');
         }
      }

   }

   private function validateEmail() {

      $val = trim($this->data['email']);
      if(empty($val)){
         $this->addError('email', 'Pole email nie może być puste.');
      } else {
         if(!filter_var($val, FILTER_VALIDATE_EMAIL)) {
            $this->addError('email', 'Adres email musi być poprawnym adresem email.');
         }
      }

   }

   private function addError($key, $val) {

      $this->errors[$key] = $val;
      
   }

}

?>