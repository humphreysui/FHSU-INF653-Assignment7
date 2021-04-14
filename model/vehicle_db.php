<?php 
  class VehicleDB{ 

    public static function get_vehicles_filtered($makeID, $typeID, $classID, $sort){
      $db = Database::getDB();
      unset($subQuery);
      $query = 'SELECT * FROM vehicles ';
      if($makeID){
        $subQuery[] = "makeID = '$makeID' ";
      } 
      if($typeID){
        $subQuery[] = "typeID = '$typeID' ";
      }
      if($classID){
        $subQuery[] = "classID = '$classID' ";
      }
      if(!empty($subQuery)){
        $query.=' WHERE '.implode(" AND ", $subQuery);   
      }
      if ($sort){
        $query .= " ORDER BY {$sort} DESC";
      }
      $statement = $db->prepare($query);
      $statement->execute();
      $vehicles = $statement->fetchAll();
      $statement->closeCursor();
      return $vehicles;
    }

    public static function get_vehicles($sort){
      $db = Database::getDB();
      if ($sort == 'year'){
        $query = 'SELECT * FROM vehicles ORDER BY year DESC';
      }else{
        $query = 'SELECT * FROM vehicles ORDER BY price DESC';
      } 
      $statement = $db->prepare($query);
      $statement->execute();
      $vehicles = $statement->fetchAll();
      $statement->closeCursor();
      return $vehicles;
    }

    public static function delete_vehicle($vehicleID){
      $db = Database::getDB();
      $query = 'DELETE FROM vehicles WHERE vehicleID = :vehicleID';
      $statement = $db->prepare($query);
      $statement->bindValue(':vehicleID', $vehicleID);
      $statement->execute();
      $statement->closeCursor();
    }

    public static function add_vehicle($makeID, $typeID, $classID, $year, $model, $price){
      $db = Database::getDB();
      $query = 'INSERT INTO vehicles 
                (year, model, price, typeID, classID, makeID) 
                VALUES 
                (:year, :model, :price, :typeID, :classID, :makeID)';
      $statement = $db->prepare($query);
      $statement->bindValue(':year', $year);
      $statement->bindValue(':model', $model);
      $statement->bindValue(':price', $price);
      $statement->bindValue(':typeID', $typeID);
      $statement->bindValue(':classID', $classID);
      $statement->bindValue(':makeID', $makeID);
      $statement->execute();
      $statement->closeCursor();
    }
  }