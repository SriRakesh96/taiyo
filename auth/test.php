<?php
  
  // The plain text password to be hashed
  $plaintext_password = "Taiyo@2022labs";
  
  // The hash of the password that
  // can be stored in the database
  $hash = password_hash($plaintext_password, 
          PASSWORD_DEFAULT);
  
  // Print the generated hash
  echo "Generated hash: ".$hash;
?>