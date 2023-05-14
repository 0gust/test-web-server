<html>

<body>
  <?php
  $error = '';
  $name = '';
  $surname = '';
  $nat = '';
  $color = '';
  $vehicle = '';

  function clean_txt($string)
  {
    $string = trim($string);
    $string = stripslashes($string);
    $string = htmlspecialchars($string);
    return $string;
  }

  if (isset($_POST["submit"])) {
    if (empty($_POST["Name"])) {
      $error .= '<p><label>Please Enter your Name</label></p>';
    } 
    else {
      $name = clean_txt($_POST["Name"]);
      if (!preg_match("/^[a-zA-Z]*$/", $name)) {
        $error .= '<p><label>Only letters and whitespaces allowed</label></p>';
      }
    }
    if (empty($_POST["Surname"])) {
      $error .= '<p><label>Please Enter your surname</label></p>';
    } else {
      $surname = clean_txt($_POST["Surname"]);
      if (!preg_match("/^[a-zA-Z]*$/", $surname)) {
        $error .= '<p><label>Only letters and whitespaces allowed</label></p>';
      }
    }
    if (empty($_POST["Nat"])) {
      $error .= '<p><label>Please Enter your nationality</label></p>';
    } else {
      $nat = clean_txt($_POST["Nat"]);
      if (!preg_match("/^[a-zA-Z]*$/", $nat)) {
        $error .= '<p><label>Only letters and whitespaces allowed</label></p>';
      }
    }
    if (empty($_POST["Color"])) {
      $error .= '<p><label>Please Select your color</label></p>';
    } else {
      $color = clean_txt($_POST["Color"]);
      if (!preg_match("/^[a-zA-Z]*$/", $color)) {
        $error .= '<p><label>Only letters and whitespaces allowed</label></p>';
      }
    }
    if (empty($_POST["Vehicle"])) {
      $error .= '<p><label>Please Select your vehicle</label></p>';
    } else {
      $vehicle = clean_txt($_POST["Vehicle"]);
      if (!preg_match("/^[a-zA-Z]*$/", $vehicle)) {
        $error .= '<p><label>Only letters and whitespaces allowed</label></p>';
      }
    }
    if ($error == '') {
      $file_open = fopen(".\customer_data.csv", "a");
      $form_data = array(
        'name' => $name,
        'surname' => $surname,
        'nat' => $nat,
        'color' => $color,
        'vehicle' => $vehicle,
      );
      fputcsv($file_open, $form_data);
      $name = '';
      $surname = '';
      $nat = '';
      $color = '';
      $vehicle = '';
      $error = 'Thank you';
    }
  }
  ?>

  <p><?php echo $error ?></p>

</body>

</html>