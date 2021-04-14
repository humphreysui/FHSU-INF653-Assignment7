<?php include 'header.php'; ?> 

<h2>Vehicle Type List</h2>

<section class="row">
  <table class="responsive-table centered highlight col l6 offset-l3 m6 offset-m3 s12">
    
    <thead>
      <tr>
        <th>Name</th>
        <th>&nbsp;</th>
      </tr>  
    </thead>

    <?php foreach ($types as $type) : ?>
    <tr>
      <td><?php echo $type['typeName']; ?></td>
      <td class="remove">
        <form action="." method="get">
          <input type="hidden" name="action" value="delete_type">
          <input type="hidden" name="typeID" value="<?php echo $type['typeID']; ?>"/>
          <button class="btn-small waves-effect waves-light deep-orange darken-2">Remove</button>
        </form>
      </td>
    </tr>
    <?php endforeach; ?>  
 
  </table>
</section>

<section class="row section">
  <h2>Add Vehicle Type</h2>
  <form action="." method="get" id="add_type" class="col l6 offset-l3 m6 offset-m3 s12">
    <input type="hidden" name="action" value="add_type">
    <label class="black-text">Name:</label><br>
    <input type="text" name="typeName"/><br>
    <button class="btn right waves-effect waves-light indigo darken-1">Add Type</button>
  </form>
</section>

<?php include 'footer.php'; ?> 