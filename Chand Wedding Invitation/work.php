<?php

      $name = $_POST["name"];
      $inv = $_POST["b"];

      $name = str_replace(" ", "_", $name);
      $name = str_replace(".", "-", $name);
      
      for ( $i = 0; $i < strlen($name); $i ++ )
      {
            if ( !( $name[$i] == "_" || $name[$i] == "-" ) )
            {
                  if ( (ord($name[$i]) >= 87 && ord($name[$i]) <= 90) || (ord($name[$i]) >= 119 && ord($name[$i]) <= 122) )
                        $name[$i] = chr(ord($name[$i]) - 26 + 4 );
                  else
                        $name[$i] = chr(ord($name[$i]) + 4 );
            }
      }
      if ( $inv == "Family" ) 
      {
            $name = "@".$name;
      }

     
      if ( !file_exists($name) )
      {
            mkdir($name);
            copy("temp.html", $name."/index.html");
      }

?>

<!DOCTYPE html>
<html lang="en">
      <head>

            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=0">
            <title>Invitee Link</title>
            
            <link rel="icon" href="Golden.jpg">
            <link rel="apple-touch-icon" href="Golden.jpg">
            <link rel="stylesheet" href="Styles for Result.css">
            <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro&display=swap" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Playfair+Display:ital,wght@1,600&family=Rouge+Script&display=swap" rel="stylesheet">
      
      </head>

      <body>

            <div class="wrapper">
                  <h1>Link Generated</h1>
                  <a href="https://adonitimez.000webhostapp.com/ChandWeddingInvitation/<?php echo $name; ?>">https://adonitimez.000webhostapp.com/ChandWeddingInvitation/<?php echo $name; ?></a>
                  <span class="txt">Send this Link to <?php echo $_POST["name"] ?>....</span><br>
                  
                  <div class="cover">
                        <input class="btn" type="button" value="Send" onclick="send()" >            
                  </div>

                  <script>

                        function send()
                        {
                              document.querySelector(".btn").setAttribute("style", "opacity: 0.7"); 
                              document.querySelector(".btn").setAttribute("disabled", "disabled"); 
                              window.location.href = "whatsapp://send?text=Hello Mr. <?php echo $_POST['name'] ?>.....                                                                                       *Mr. and Mrs. Al-Haaj T. Shamshuddin Ashrafi* has sent you the Invitation of their *Second Son's* Wedding Cermony.                                                 _Please follow the below link...._                                                    https://adonitimez.000webhostapp.com/ChandWeddingInvitation/<?php echo $name; ?>";
                              document.querySelector(".btn").removeAttribute("disabled");
                        }

                  </script>
            
            </div>
      </body>
</html>