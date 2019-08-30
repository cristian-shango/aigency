<?php
    if(!empty($_FILES['file']))
  {
    $path = "uploads/";
    $path = $path . basename( $_FILES['file']['name']);

    if(move_uploaded_file($_FILES['file']['tmp_name'], $path)) {
      echo "El archivo ".  basename( $_FILES['file']['name']). 
      " subi&oacute; correctamente.";
    } else{
        echo "En algo le erraste, prob&aacute; de nuevo.";
    }
  }
?>