<?php 
  class TypeDB{ 
    public static function get_typeName_from_types($typeID){
      $db = Database::getDB();
      $query = 'SELECT * FROM types WHERE typeID = :typeID';
      $statement = $db->prepare($query);
      $statement->bindValue(':typeID', $typeID);
      $statement->execute();
      $type = $statement->fetch();
      $statement->closeCursor();
      $typeName = $type['typeName'];
      return $typeName;
    }

    public static function get_types(){
      $db = Database::getDB();
      $query = 'SELECT * FROM types ORDER BY typeID';
      $statement = $db->prepare($query);
      $statement->execute();
      $types = $statement->fetchAll();
      $statement->closeCursor();
      return $types;
    }

    public static function delete_type($typeID){
      $db = Database::getDB();
      $query = 'DELETE FROM types WHERE typeID = :typeID';
      $statement = $db->prepare($query);
      $statement->bindValue(':typeID', $typeID);
      $statement->execute();
      $statement->closeCursor();
    }

    public static function add_type($typeName){
      $db = Database::getDB();
      $query = 'INSERT INTO types (typeName) VALUES (:typeName)';
      $statement = $db->prepare($query);
      $statement->bindValue(':typeName', $typeName);
      $statement->execute();
      $statement->closeCursor();
    }
  } 
