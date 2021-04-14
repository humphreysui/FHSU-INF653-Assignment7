<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

  <title>Zippy Admin</title> 
  <link rel="stylesheet" type="text/css" href="../css/styles.css"> 
</head>

<body>
  <header class="container row">
    <h1 class="col l10 offset-l1 s12 center-align">Zippy Admin</h1> 
  </header>
  <main class="container">
    <section class="row section">
      <?php if(isset($login_message)){ ?>
        <h2 class="red-text"><?php echo $login_message ?></h2>
      <?php } else{?>
        <h2 class="orange-text"><?php echo "Please fill in your credentials to login"; ?></h2>
        <?php } ?>
       
      <form action="." method="post" class="col l6 offset-l3 m6 offset-m3 s12">
        <input type="hidden" name="action" value="login">

        <label class="black-text">Username:</label><br>
        <input type="text" name="username"/><br>
        <label class="black-text">Password:</label><br>
        <input type="password" name="password"/><br>
        
        <button class="btn right waves-effect waves-light indigo darken-1">Sign in</button>
      </form>
    </section>
  </main>
  
</body>
</html>