<?php include 'header.php'; ?> 

<h2>Vehicle Make List</h2>

<section class="row">
  <table class="responsive-table centered highlight col l6 offset-l3 m6 offset-m3 s12">
    
    <thead>
      <tr>
        <th>Name</th>
        <th>&nbsp;</th>
      </tr>  
    </thead>
    
    <?php foreach ($makes as $make) : ?>
    <tr>
      <td><?php echo $make['makeName']; ?></td>
      <td class="remove">
        <form action="." method="get">
          <input type="hidden" name="action" value="delete_make">
          <input type="hidden" name="makeID" value="<?php echo $make['makeID']; ?>"/>
          <button class="btn-small waves-effect waves-light deep-orange darken-2">Remove</button>
        </form>
      </td>
    </tr>
    <?php endforeach; ?>  
 
  </table>
</section>

<section class="row section">
  <h2>Add Vehicle Make</h2>
  <form action="." method="get" id="add_make" class="col l6 offset-l3 m6 offset-m3 s12">
    <input type="hidden" name="action" value="add_make">
    <label class="black-text">Name:</label><br>
    <input type="text" name="makeName"/><br>
    <button class="btn right waves-effect waves-light indigo darken-1">Add Make</button>
  </form>
</section>

<?php include 'footer.php'; ?> 