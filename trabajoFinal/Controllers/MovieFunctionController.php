<?php
    namespace Controllers;

use ArrayObject;
use DAO\MovieFunctionDBDAO as MovieFunctionDBDAO;
    use DAO\MovieDBDAO as MovieDBDAO;
    use DAO\CinemaDBDAO as CinemaDBDAO;
    use DAO\GenreDBDAO as GenreDBDAO;
    use Models\Cinema as Cinema;
    use Models\Movie as Movie;
    use Models\MovieFunction as MovieFunction;
    use DateTime;

    class MovieFunctionController
    {
        private $movieFunctionDBDAO;
        private $movieDBDAO;
        private $cinemaDBDAO;
        private $genreDBDAO;

        public function __construct()
        {
            $this->movieFunctionDBDAO = new MovieFunctionDBDAO();
            $this->movieDBDAO = new MovieDBDAO();
            $this->cinemaDBDAO = new CinemaDBDAO();
            $this->genreDBDAO = new GenreDBDAO();
        }
      
        public function showAddView(){
            $cinemas = $this->cinemaDBDAO->readAll();
            $movies = $this->movieDBDAO->readAll();
            require_once(VIEWS_PATH.'movieFunctionAdd.php');
        }

        public function Add($cinemaId,$movieId,$dateTime)
        {
            $movieFunction = new MovieFunction();
            $movieFunction->setStartDateTime($dateTime);
            $movieFunction->setCinemaId($cinemaId);
            $movieFunction->setMovieId($movieId);

            $this->movieFunctionDBDAO->Add($movieFunction);

            $this->ShowAddView();
        }

        public function showMovieFunctionListDB(){
            $lista = $this->movieFunctionDBDAO->readAll();
            include_once(VIEWS_PATH."showFunctionList.php");
        }

        public function showMovieFunctionOrderByTimeDB(){
            $lista = $this->movieFunctionDBDAO->readOrderByTime();
            include_once(VIEWS_PATH."showFunctionList.php");
        }

        public function listMovieFunctionListDB(){
            $moviesArray = $this->movieFunctionDBDAO->readAllMovies();
            $lista = array();
            if($moviesArray!=false){
                foreach($moviesArray as $array=>$v){
                array_push($lista,$this->movieDBDAO->read($v['movie_id']));
                }
            }
            include_once(VIEWS_PATH."movieList.php");
        }

        public function showMovieFunctionByGenreDB(){
            $genres = $this->genreDBDAO->readAll();
            include_once(VIEWS_PATH."selectGenre.php");
        }

        public function listMovieFunctionListByGenreDB($genreId){
            $moviesArray = $this->movieFunctionDBDAO->readAllMoviesByGenres($genreId);
            $lista = array();
            if($moviesArray!=false){
                foreach($moviesArray as $array=>$v){
                array_push($lista,$this->movieDBDAO->read($v['movie_id']));
                }
            }
            include_once(VIEWS_PATH."movieList.php");
        }
        
      public function readOrderByCinemaId($cinema_id){   
        $cinema_id = (int)$cinema_id;        
        $lista = array();
        $cinema = new Cinema();
        $cinema = $this->cinemaDBDAO->readById($cinema_id);
        $lista=$this->movieFunctionDBDAO->readOrderByCinemaId($cinema_id);
        
        if(($lista!=false)&&(count($lista)>0)){
            foreach($lista as $item){
                $movie = new Movie();
                $movie= $this->movieDBDAO->read($item->getMovieId());
                $item->setEndDateTime($movie);
                $item->getEndDateTime($movie);
            }   
            include_once(VIEWS_PATH."showFunctionList.php");             
        }else{ 
            include_once(VIEWS_PATH."cinemalist.php");
            return false;
            
        }

        public function RemoveDB($movieFunctionId) //TODO cambiar a $cinema
        {
            $this->movieFunctionDBDAO->Remove($movieFunctionId);

            $this->showMovieFunctionListDB();
        }
                                                                                                                               
 }
    
?> 