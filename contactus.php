		
    <h3>Kontaktformular</h3>



<?php
  
  $notiz_name = "";
  $notiz_telefon = "";
  $notiz_email = "";
  $notiz_text = "";


  if(!empty($_POST)){
    
    $fehler = false;
    
    
    if(!empty($_POST['name'])){
      $name = $_POST['name'];
    } else {
      $notiz_name = "Bitte Namen angeben...<br>";
      $fehler = true;
    } 
  
    if(!empty($_POST['telefon'])){
      $telefon = $_POST['telefon'];
    } else {
      $notiz_telefon = "Bitte Telefon angeben...<br>";
      $fehler = true;
    } 
  
    if(!empty($_POST['email'])){
      $email = $_POST['email'];
      
      if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) == false){
        $notiz_email = "Keine korrekte E-Mail angegeben...<br>";
        
        $fehler = true;
      }
      
    } else {
      $notiz_email = "Bitte E-Mail angeben...<br>";
      $fehler = true;
    } 

    
  
    if(!empty($_POST['text'])){
      $text = $_POST['text'];
    } else {
      $notiz_text = "Bitte Text angeben...<br>";
      $fehler = true;
    } 
    
    
    
    $rueckruf = false;
    if(isset($_POST['rueckruf'])) $rueckruf = true;
  
  
    if($fehler == false){
    
      $ausgabe = "Folgende Daten wurden angegeben:<br><br>
       
      Name: " . $name . "<br>
      Telefon: ".$telefon."<br>
      E-Mail: ". $email."<br>
      Text:<br>".str_replace("\n","<br>",$text)."<br><br>";
    
      if($rueckruf) $ausgabe .= "Ein Rückruf ist erwünscht";
      
      echo $ausgabe;  
      
      echo "<hr>";
      
      require 'PHPMailer/PHPMailerAutoload.php';
    
      $mail = new PHPMailer;
      
      //$mail->SMTPDebug = 3;                               // Enable verbose debug output
      
      
      
      
    
    
      $mail->isSMTP();                                      // Set mailer to use SMTP
      $mail->Host = 'sslout.df.eu';       // Specify main and backup SMTP servers
      $mail->SMTPAuth = true;                               // Enable SMTP authentication
      $mail->Username = 'fom@jfco.de';                 // SMTP username
      $mail->Password = 'nuNuH:s4xerh';                           // SMTP password
      $mail->SMTPSecure = 'ssl'; //'none';                            // Enable TLS encryption, `ssl` also accepted
      $mail->Port = 465;                                    // TCP port to connect to
      
      $mail->setFrom('fom@jfco.de','FOM Mailer');
      $mail->addAddress('f.proepper@jfconcept.de');     // Add a recipient
      $mail->isHTML(true);                                  // Set email format to HTML
      
      $mail->Subject = 'Neue Nachricht von' . $name;
      $mail->Body    = $ausgabe;
      
      //if(!$mail->send()) {
      if(1==2){
          echo 'Fehler beim senden der Nachricht:';
          echo 'Mailer Error: ' . $mail->ErrorInfo;
      } else {
          echo 'Nachricht erfolgreich versendet';
      }
    
    }
  }
?>


		
		<form action="index.php?seite=kontakt" method="POST">
  		
  		<table border="0">
    		<tr>
      		<td>
        		<label for="name">Name</label>
          </td>
      		<td>
        		<input type="text" name="name" id="name" value="<?php if(isset($_POST['name'])) echo $_POST['name']; ?>">
          </td>
          <td class="error"><?php
            echo $notiz_name;
            ?></td>
    		</tr>
    		<tr>
      		<td><label for="telefon">Telefon</label></td>
      		<td><input type="text" name="telefon" id="telefon"></td>
      		<td class="error"><?php echo $notiz_telefon; ?></td>
    		</tr>
    		<tr>
      		<td><label for="email">E-Mail</label></td>
      		<td><input type="text" name="email" id="email"></td>
      		<td class="error"><?php echo $notiz_email; ?></td>
    		</tr>
    		<tr>
      		<td>Rückruf?</td>
      		<td><label><input type="checkbox" name="rueckruf" id="rueckruf"> Ich wünsche einen Rückruf</label></td>
    		</tr>
    		<tr>
      		<td valign="top"><label for="text">Nachricht</label></td>
      		<td><textarea name="text" id="text"></textarea></td>
      		<td class="error"><?php echo $notiz_text; ?></td>
    		</tr>
    		<tr>
      		<td></td>
      		<td>
        		<input type="submit" value="Formular absenden">
      		</td>
    		</tr>
  		</table>
  		
		</form>
