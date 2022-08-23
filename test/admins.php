<?php 

$file = fopen("books/pdf/", "r+");


$msg = ($file) ? "opened" : "error";


echo $msg;

/*

$file = "books/pdf/rapport2.pdf";
    
  // Type de contenu d'en-tête
  header("Content-type: application/pdf"); 
    
  header("Content-Length: " . filesize($file)); 
    
  // Envoyez le fichier au navigateur.
  readfile($file); 

*/
 
?>


