<?php 
        namespace Models;
        class MovieFunction{

            private $movieFunctionId;
            private $startDateTime;
            private $cinemaId; //object cinema
            private $movieId; // object movie
            private $endDateTime;


            public function __construct()
             {
            
             }

             public function getMovieFunctionId()
             {
                return $this->movieFunctionId;
             }
            
             public function getStartDateTime()
             {
                 return $this->startDateTime;
             }
            
             public function getCinemaId()
             {
                 return $this->cinemaId;
             }
           
             public function getMovieId()
             {
                 return $this->movieId;
             }

             public function setMovieFunctionId($movieFunctionId)
             {
                 $this->movieFunctionId=$movieFunctionId;
             }
           
             public function setStartDateTime($startDateTime)
             {
                 $this->startDateTime=$startDateTime;
             }
            
             public function setCinemaId($cinemaId)
             {
                 $this->cinemaId=$cinemaId;
             }
            
             public function setMovieId($movieId)
             {
                 $this->movieId=$movieId;
             }
             // esto agregado ahora
             public function setEndDateTime($movie){ 
                (int) $minutes = (int) $movie->getRuntime(); //poner en un variable externa 15 minutos
                $this->endDateTime = date('Y-m-d H:i:s', strtotime('+'.$minutes.'minutes',strtotime($this->getStartDateTime()))) ;// capaz que falta :m
                
            }
              public function getEndDateTime(){
                  return $this->endDateTime;
              }
 

        }