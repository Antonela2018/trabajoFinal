<?php
if(($lista==false)&&($movie ==null)&&($cinema=!null)){
	echo '<script>alert("No hay funciones en la base de datos");</script>';
}else{
	foreach($lista as $item){
<<<<<<< HEAD
		echo "<h2>"."Cine: ".$item->getCinemaId()."</h2>";
		echo '<dl>'.
				'<dt> Pelicula: '.$item->getMovieId().'<dt>'.
				'<dd> Fecha y hora: '.$item->getStartDatetime().'</dd>'.
			'</dl>';
=======
		if($item->getMovieId()== $movie->getMovieId()){
			echo '<dl>'.
		        '<dt> MovieFunction:'.(int)$item->getMovieFunctionId().'<dt>'.
				'<dt> Pelicula: '.$movie->getTitle().'<dt>'.
				'<dt> Duracion: '.$movie->getRuntime().'<dt>'.
				'<dt> Cine: '.$item->getCinemaId().'<dt>'.
				'<dd> Inicio: '.$item->getStartDatetime().'</dd>'.
				'<dd> Finalizacion: '.$item->getEndDateTime().'</dd>'.
				'<dd> Valor entrada: '.$cinema->getTicketValue().'</dd>'.
			'</dl>';		
		}	
>>>>>>> local
	}
}
echo '<form action="'.FRONT_ROOT.'Login/homeAdmin">
	<button>Volver</button></form>';
?>