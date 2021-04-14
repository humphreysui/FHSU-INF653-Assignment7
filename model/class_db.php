<?php 
  class ClassDB{ 

    public static function get_className_from_classes($classID){
      $db = Database::getDB();
      $query = 'SELECT * FROM classes WHERE classID = :classID';
      $statement = $db->prepare($query);
      $statement->bindValue(':classID', $classID);
      $statement->execute();
      $class = $statement->fetch();
      $statement->closeCursor();
      $className = $class['className'];
      return $className;
    }

    public static function get_classes(){
      $db = Database::getDB();
      $query = 'SELECT * FROM classes ORDER BY classID';
      $statement = $db->prepare($query);
      $statement->execute();
      $classes = $statement->fetchAll();
      $statement->closeCursor();
      return $classes;
    }

    public static function delete_class($classID){
      $db = Database::getDB();
      $query = 'DELETE FROM classes WHERE classID = :classID';
      $statement = $db->prepare($query);
      $statement->bindValue(':classID', $classID);
      $statement->execute();
      $statement->closeCursor();
    }

    public static function add_class($className){
      $db = Database::getDB();
      $query = 'INSERT INTO classes (className) VALUES (:className)';
      $statement = $db->prepare($query);
      $statement->bindValue(':className', $className);
      $statement->execute();
      $statement->closeCursor();
    }
  }
   
