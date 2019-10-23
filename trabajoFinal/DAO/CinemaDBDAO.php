<?php
    namespace DAO;
    use DAO\Connection;
    use \PDO as PDO;
    use \Exception as Exception;
    use DAO\QueryType as QueryType;
    use Models\Cinema;

    class cinemaDBDAO
    {
         
         private $connection;

         public function __construct()
         {
            $this->connection = null;
         }

         
      public function readAll(){
        $sql = "SELECT * FROM cinemas";
        try
        {
            $this->connection = Connection::getInstance();
            $resultSet = $this->connection->execute($sql);
        }
        catch(PDOException $e)
        {
            echo $e;
        }
        if (!empty($resultSet))
           return $this->mapear($resultSet);
        else 
           return false;
    }  

    protected function mapear($value) {

        
        $cinemaList = array();
        foreach($value as $v){
            $cinema = new Cinema();
            $cinema->setName($v['namecinema']);
            $cinema->setTicketValue($v['ticketValue']);
            $cinema->setAdress($v['adress']);
            $cinema->setCapacity($v['capacity']);
            array_push($cinemaList,$cinema);
        }
        echo count($cinemaList);
        print_r($cinemaList);


        /*
        $value = is_array($value) ? $value : [];
        

        $resp = array_map(function($p){

            $category = $this->createCategory($p['id_category']);

            return new cinema( $p['name'], $ad['adress'] ,$p['capacity'], $p['ticket_value']);

        }, $value);
       */
        /* devuelve un arreglo si tiene datos y sino devuelve nulo*/
        //    return count($resp) > 0 ? $resp : null;
     }

       public function create($cinema)
      {
            // Guardo como string la consulta sql utilizando como value, marcadores de parámetros con name (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada 

            $sql = "INSERT INTO cinemas (namecinema,ticketValue,adress,capacity) VALUES (:namecinema, :ticket_value, :adress, :capacity)";

            $parameters['namecinema'] = $cinema->getName();
            $parameters['ticketValue'] = $cinema->getTicketValue();
            $parameters['adress'] = $cinema->getAdress();
            $parameters['capacity'] = $cinema->getCapacity();

            try
            {

                    $this->connection = Connection::getInstance();
                    return $this->connection->ExecuteQuery($sql, $parameters);
            }
            catch(PDOException $e)
            {
                echo $e;
            }


      }

/*
    public function read ($title)
    {
        $sql = "SELECT * FROM cinemas where title = :title";
        $parameters['title'] = $title;

        try
        {
            $this->connection = Conn::getInstance();
            $resultSet = $this->connection->execute($sql, $parameters);
        }
        catch(PDOException $e)
        {
            echo $e
        }

        if(!empty)
        {
            return $this->mapear($resultSet);
            else
                return false;
        }
    }


    public funtion readby($id)
    {
        sql= "SELECT * FROM cinemas where id_cinema =:id_cinema";
        $parameters['id_cinema'] = $id;
        try
        {
            $this->connection = Conn getInstance();
            $resultSet =$this->connection->execute)($sql,$parameters);
        }
        catch(PDOException $e){

            echo $e
        }
        if(!emptyresultSet))
        {
            return $this->mapear($resutSet);
            else
                return false;

    }
     public function readByDate ($date)

    {

        $sql = "SELECT * FROM cinemas where date = :date";



        $parameters['date'] = $date;



        try

        {

            $this->connection = Conn::getInstance();

            $resultSet = $this->connection->execute($sql, $parameters);

        }

        catch(PDOException $e)

        {

            echo $e;

        }



        if(!empty($resultSet))

            return $this->mapear($resultSet);

        else

            return false;

    }



    public function readByImg($img)

    {

      $sql = "SELECT * FROM events where img = :img";



      $parameters['img'] = $img;



      try

      {

          $this->connection = Conn::getInstance();

          $resultSet = $this->connection->execute($sql, $parameters);

      }

      catch(PDOException $e)

      {

          echo $e;

      }



      if(!empty($resultSet))

          return $this->mapear($resultSet);

      else

          return false;

    }



    public function update ($id,$title)

    {

      $sql = "UPDATE cinemas SET title = :title  WHERE id_cinema = :id_event";

      $parameters['id_cinema'] = $id;

      $parameters['title'] = $title;



      try

      {

          $this->connection = Conn::getInstance();

          return $this->connection->ExecuteNonQuery($sql, $parameters);

      }

      catch(PDOException $e)

      {

          echo $e;

      }

    }



    public function delete ($title)

    {

        $sql = "DELETE FROM cinema WHERE title = :title";



        $parameters['title'] = $title;



        try

        {

            $this->connection = Conn::getInstance();

            return $this->connection->ExecuteNonQuery($sql, $parameters);

        }

        catch(PDOException $e)

        {

            //echo $e;

            echo '<script>alert("No se puede borrar porque el evento esta vinculado a un calendario");</script>';

        }

   }


*/




    /**

    * Transforma el listado de usuario en

    * objetos de la clase User

    *

    * @param  Array $gente Listado de personas a transformar

    */
/*
    

     protected function createCategory($id_category)

     {

        $daoCategory = DaoCategory::getInstance();



        $category = $daoCategory->readById($id_category);



        $category = new M_Category($category['0']->getDescription(),$category['0']->getId());



        return $category;

     }
*/
}

       
?>