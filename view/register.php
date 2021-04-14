<?php include 'header.php'; ?> 

<?php if ($firstname){?>
  <section class="container section">
    <h4 class="orange-text left-align">Thank you for registering, <?php echo $firstname ?>!</h4>
    <p class="section"><a href=".">Click Here</a> to view the vehicle list.</p>
  </section>
  

<?php }else{ ?>
  <form action="." method="get" class="col l10 offset-l1 m8 offset-m2 s12">
    <input type="hidden" name="action" value="register">
    <label>Please Enter Your First Name:</label><br>
    <input type="text" name="firstname">
    <button class="right btn-small waves-effect waves-light indigo darken-1">Register</button>
  </form>
<?php } ?>

<?php include 'footer.php'; ?>  