<?php
    namespace DAO;
    use DAO\Connection;
    use \PDO as PDO;
    use \Exception as Exception;
    use DAO\QueryType as QueryType;
    use Models\Cinema as Cinema;
    use Models\Movie as Movie;
    use Models\MovieFunction as MovieFunction;

    class MovieFunctionDBDAO
    {
         
      private $connection;

        public function __construct()
         {
            $this->connection = null;
         }

         
    public function readAll()
    {
        $sql = "SELECT * FROM movieFunctions";
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

    public function readAllMovies()
    {
        $sql = "SELECT movie_id FROM movieFunctions GROUP BY movie_id";
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
           return $resultSet;
        else 
           return false;
    }
    
    public function readAllMoviesByGenres($genreId)
    {
        $sql = "SELECT m.movie_id FROM movieFunctions as m JOIN genresByMovies as gbm 
        on m.movie_id = gbm.movie_id WHERE gbm.genre_id = :genreId GROUP BY m.movie_id";
        $parameters['genreId'] = $genreId;

        try
        {
            $this->connection = Connection::getInstance();
            $resultSet = $this->connection->execute($sql,$parameters);
        }
        catch(PDOException $e)
        {
            echo $e;
        }
        if (!empty($resultSet))
           return $resultSet;
        else 
           return false;
    }  

    public function readOrderByTime()
    {
        $sql = "SELECT * FROM movieFunctions ORDER BY start_datetime";
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
    
    protected function mapear($value)
     {

        
        $movieFunctionList = array();
        foreach($value as $v)
        {
            $movieFunction = new MovieFunction();
<<<<<<< HEAD
            $movieFunction->setMovieFunctionId($v["movieFunction_id"]);
=======
            $movieFunction-> setMovieFunctionId($v['movieFunction_id']);
>>>>>>> local
            $movieFunction->setCinemaId($v['cinema_id']);
            $movieFunction->setMovieId($v['movie_id']);
            $movieFunction->setStartDateTime($v['start_datetime']);
            //setEndDateTime
            array_push($movieFunctionList,$movieFunction);
        }
        if(count($movieFunctionList)>0)
            return $movieFunctionList;
        else
            return false;
     }

      public function Add($movieFunction) // movieFunction is an object
       {
        // Guardo como string la consulta sql utilizando como value, marcadores de parámetros con name (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada 

        $sql = "INSERT INTO movieFunctions(start_datetime,cinema_id,movie_id)
        VALUES (:start_datetime,:cinema_id,:movie_id)";
        
        $parameters['start_datetime'] = $movieFunction->getStartDateTime();
        $parameters['cinema_id'] = $movieFunction->getCinemaId();
        $parameters['movie_id'] = $movieFunction->getMovieId();
        $movieFunction->setEndDateTime();

        try
        {
                $this->connection = Connection::getInstance();
                return $this->connection->ExecuteNonQuery($sql, $parameters);
        }
        catch(PDOException $e)
        {
            echo $e;
        }
    }

    public function Remove($movieFunction) //$movieFunction is an object
    {
        $sql = "DELETE FROM movieFunctions WHERE  movieFunction_id = :movieFunction_id";
        $parameters['movieFunctions_id'] = $movieFunction->getMovieFunctionId();
        
        try{
            $this->connection = Connection::getInstance();
            return $this->connection->ExecuteNonQuery($sql, $parameters);
        }
        catch(PDOException $e){
            echo $e;
        }
    }

    public function read ($movieFunction)
    {
        $sql = "SELECT * FROM movieFunctions where movieFunction_id = :movieFunction_id";
        $parameters['movieFunction_id'] = $movieFunction->getMovieFunctionId();
        try
        {
            $this->connection = Connection::getInstance();
            $resultSet = $this->connection->execute($sql, $parameters);
        }
        catch(PDOException $e)
        {
            echo $e;
        }
        if(!empty($resultSet))
        {
            $result = $this->mapear($resultSet);
            $movieFunction = new MovieFunctions();
            $movieFunction->setMovieFunctionId($result[0]->getMovieFunctionId());
            $movieFunction->setCinemaId($result[0]->getCinemaId());
            $movieFunction->setMovieId($result[0]->getMovieId());
            $movieFunction->setStartDateTime($result[0]->getStartTime());
            $movieFunction->setEndDateTime($result[0]->getEndTime());
            return $movieFunction;
            
        }else
     
        return false;
    }
 
        // estoy cambiando esto ahora
    public function readAvailableMovies ($startDateTime)
    {   

<<<<<<< HEAD
    public function validateMovieFunctionDate($cinema_id,$startDateTime)
    {
        $sql = "SELECT * FROM movieFunctions WHERE cinema_id = :cinema_id AND start_datetime LIKE '".$startDateTime."%' ";
        //$parameters['startDateTime'] = $startDateTime;
        $parameters['cinema_id'] = $cinema_id;
        try
        {
            $this->connection = Connection::getInstance();
            $resultSet = $this->connection->execute($sql,$parameters);
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
    public function validateMovieFunctionDateByMovie($movie_id,$startDateTime)
    {
        $sql = "SELECT * FROM movieFunctions WHERE movie_id = :movie_id AND start_datetime LIKE '".$startDateTime."%' ";
        //$parameters['startDateTime'] = $startDateTime;
        $parameters['movie_id'] = $movie_id;
=======
        $sql = "SELECT * FROM movieFunctions WHERE ('@startDateTime' NOT BETWEEN fromdate AND todate
        AND '@endDateTime'  NOT BETWEEN fromdate AND todate)";
       // $parameters['movieFunction_id'] = $movieFunction->getMovieFunctionId();
        try
        {
            $this->connection = Connection::getInstance();
            $resultSet = $this->connection->execute($sql, $parameters);
        }
        catch(PDOException $e)
        {   
            echo $e;
        }
        if(!empty($resultSet))
        {
            $result = $this->mapear($resultSet);
             
            return $result;            
        }else
 
        return false;
    }
    public function readOrderByCinemaId($cinema_id)
    {
        echo "entro a moviefuntdb"; echo '<br>';
        
        if($cinema_id === 1){
            echo 'true'; echo'<br>';
           }            
           else{
            echo 'false'; echo'<br>';
           }

        $sql = "SELECT * FROM movieFunctions WHERE cinema_id = :cinema_id";
        $parameters['cinema_id']= $cinema_id;
>>>>>>> local
        try
        {
            $this->connection = Connection::getInstance();
            $resultSet = $this->connection->execute($sql,$parameters);
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
<<<<<<< HEAD
=======


    
>>>>>>> local
}     
?>