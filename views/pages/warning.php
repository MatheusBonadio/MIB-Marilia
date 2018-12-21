  <?php
    $jsonUrl = $_SERVER['DOCUMENT_ROOT'].'/public/json/warnings.json';
    $jsonData = file_get_contents($jsonUrl, true);
    $obj = json_decode($jsonData);
    $errorKey = (isset($errorKey)) ? $errorKey:'404';
  ?>
  <link rel='stylesheet' href='/public/css/warning.css' type='text/css'>

  <div class='container flex'>
      <div class='title'><?php echo $obj->$errorKey->key ?></div>
      <div class='subtitle'><?php echo $obj->$errorKey->text ?></div>
  </div>
