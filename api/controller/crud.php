<?php
    include_once '../config/config.php';
    class CRUDOperation
    {
        public function generateId()
        {
            $connection = new MyConnection();
            global $con;
            try
            {
                $this->con = $connection->getConnection();
                $query = "SELECT MAX(ID) AS ID FROM images";
                $stmt = $this->con->prepare($query);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                $id = $result["ID"];
                if($id!=null)
                {
                    $head = substr((string)$id,4);
                    $temp = (int)$head;
                    $temp += 1;
                }
                else
                {
                    $temp = 1;
                }
                return (int)"2018".$temp;
            } 
            catch (PDException $ex) 
            {

            }
        }
        public function insert($arr)
        {
            $connection = new MyConnection();
            global $con;
            try
            {
                $this->con = $connection->getConnection();
                $query = "INSERT INTO images VALUES(:id,:name,:description,:url,now())";
                $object = new CRUDOperation();
                $id = $object->generateId();
                $stmt = $this->con->prepare($query);
                $stmt->bindParam("id",$id);
                $stmt->bindParam("name",$arr["NAME"]);
                $stmt->bindParam("description",$arr["DESCRIPTION"]);
                $stmt->bindParam("url",$arr["URL"]);
                if($stmt->execute())
                {
                    return true;
                }
                else 
                {
                    return false;
                }
            } 
            catch (PDOException $ex) 
            {
                echo $ex;
                return false;
            }
        }
        public function select()
        {
            $connection = new MyConnection();
            global $con;
            try 
            {
                $this->con = $connection->getConnection();
                $query="SELECT * FROM images";
                $stmt = $this->con->prepare($query);
                $stmt->execute();
                $jsonData = array();
                while($row = $stmt->fetch(PDO::FETCH_ASSOC))
                {
                    extract($row);
                    $tempArray=array(
                        "ID"=>$row["ID"],
                        "NAME"=>$row["NAME"],
                        "DESCRIPTION"=>$row["DESCRIPTION"],
                        "URL"=>$row["URL"],
                        "DATE"=>$row["DATE"]
                    );
                    array_push($jsonData,$tempArray);
                }
                return json_encode($jsonData);
            } 
            catch(PDOException $ex) 
            {
                return null;
            }
        }
    }
?>

