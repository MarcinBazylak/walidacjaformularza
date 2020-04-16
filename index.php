<?php

require('validate.php');

   if(isset($_POST['submit'])) {

      $validation = new validateUser($_POST);
      $errors = $validation->validateForm();

      if(empty($errors)) {
         echo '<div class="green">Konto zostało utworzone.</div>';
         // Wpis do bazy i wysłanie emaila z potwierdzeniem
      }

   }

?>

<html lang="pl">
<head>
   <meta charset="UTF-8">
   <link rel="stylesheet" href="style.css">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Walidacja formularza</title>
</head>
<body>

   <div class="new-user">
      <h2>Nowy użytkownik</h2>
      <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
         <label for="">Nazwa użytkownika:</label>
         <input type="text" name="username">
         <div class="errors">
            <?php echo $errors['username'] ?? '' ?>
         </div>
         <label for="">Email:</label>
         <input type="text" name="email">
         <div class="errors">
            <?php echo $errors['email'] ?? '' ?>
         </div>
         <input type="submit" value="utwórz" name="submit"></button>
      </form>
   </div>
   
</body>
</html>