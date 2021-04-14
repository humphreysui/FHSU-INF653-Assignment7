<?php 

  switch($action){
    case "show_type_form":
      $types = TypeDB::get_types();
      include('view/types.php');
      break;
    case "add_type":
      TypeDB::add_type($typeName);
      header('Location: .?action=show_type_form');
      break;
    case "delete_type":
      if($typeID){
        try{
          TypeDB::delete_type($typeID);
        }catch(PDOException $e){
          $errorMessage = "You can't delete type when vehicle exits in the type database.";
          include('view/error.php');
          exit();
        }
        header('Location: .?action=show_type_form');
      }else{
        $errorMessage='incorrect vehicle type data.';
        include('view/error.php');
        exit();
      }
      break;
 }