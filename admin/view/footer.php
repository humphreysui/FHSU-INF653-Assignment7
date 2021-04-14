  <!-- modified footer to gather all links -->
  <section class="row page-link">
    <div class="col l6 offset-l3 m8 offset-m3 s12">
      <?php if ($action !== 'list_vehicles') { ?>  
      <p><a class="black-text" href=".">View Full Vehicle List</a></p>
      <?php } ?>
      <?php if ($action !== 'show_vehicle_form') { ?>
      <p><a class="black-text" href=".?action=show_vehicle_form">Click here</a> to add a vehicle.</p>
      <?php } ?>
      <?php if ($action !== 'show_make_form') { ?>
      <p><a class="black-text" href=".?action=show_make_form">View/Edit Vehicle Makes</a></p>
      <?php } ?>
      <?php if ($action !== 'show_type_form') { ?>
      <p><a class="black-text" href=".?action=show_type_form">View/Edit Vehicle Types</a></p>
      <?php } ?>
      <?php if ($action !== 'show_class_form') { ?>
      <p><a class="black-text" href=".?action=show_class_form">View/Edit Vehicle Classes</a></p>
      <?php } ?>
      <?php if ($action !== 'show_register') { ?>
      <p><a class="black-text" href=".?action=show_register">Register New Admin User</a></p>
      <?php } ?>
      <?php if ($action !== 'logout') { ?>
      <p><a class="black-text" href=".?action=logout">Sign Out</a></p>
      <?php } ?>
    </div>
  </section>

</main>

<div class="divider"></div>

<footer class="page-footer footer-copyright container white section">
  <div class="center-align black-text">
    &copy; 2021 Zippy Used Auto by Humphrey Sui, Qiupeng (admin page).
  </div> 
</footer>

<script>
  $(document).ready(function () {
    $('select').formSelect();
    $('.tabs').tabs();
  });
</script>

</body> 
</html>
