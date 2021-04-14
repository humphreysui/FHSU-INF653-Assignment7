<?php 
  class MakeDB {

    public static function get_makeName_from_makes($makeID){
      $db = Database::getDB();
      $query = 'SELECT * FROM makes WHERE makeID = :makeID';
      $statement = $db->prepare($query);
      $statement->bindValue(':makeID', $makeID);
      $statement->execute();
      $make = $statement->fetch();
      $statement->closeCursor();
      $makeName = $make['makeName'];
      return $makeName;
    }

    public static function get_makes(){
      $db = Database::getDB();
      $query = 'SELECT * FROM makes ORDER BY makeID';
      $statement = $db->prepare($query);
      $statement->execute();
      $makes = $statement->fetchAll();
      $statement->closeCursor();
      return $makes;
    }

    public static function delete_make($makeID){
      $db = Database::getDB();
      $query = 'DELETE FROM makes WHERE makeID = :makeID';
      $statement = $db->prepare($query);
      $statement->bindValue(':makeID', $makeID);
      $statement->execute();
      $statement->closeCursor();
    }

    public static function add_make($makeName){
      $db = Database::getDB();
      $query = 'INSERT INTO makes (makeName) VALUES (:makeName)';
      $statement = $db->prepare($query);
      $statement->bindValue(':makeName', $makeName);
      $statement->execute();
      $statement->closeCursor();
    }

  }
   

  
   
