<?php
if(($lista==false)){
	echo '<script>alert("No hay funciones en la base de datos");</script>';
}else{
	foreach($lista as $item){
		if($item->getMovieId()== $movie->getMovieId()){
   echo'<table>
		<tr>
		  <td>FunctioName</td>
		  <td>Title</td>
		  <td>Runtime</td>
		  <td>CinemaId</td>
		  <td>StartDateTime</td>
		  <td>EndTimeDate</td>
		  <td>TicketValue</td>
		</tr>
		 <tr><td> MovieFunction:'.'</td><td>'.(int)$item->getMovieFunctionId().'</td></tr>
		 <tr><td>. Pelicula:.</td><td>'.$movie->getTitle().'</td></tr>
		</table>';
		/*
			echo '<dl>'.
		        '<dt> MovieFunction:'.(int)$item->getMovieFunctionId().'<dt>'.
				'<dt> Pelicula: '.$movie->getTitle().'<dt>'.
				'<dt> Duracion: '.$movie->getRuntime().'<dt>'.
				'<dt> Cine: '.$item->getCinemaId().'<dt>'.
				'<dd> Inicio: '.$item->getStartDatetime().'</dd>'.
				'<dd> Finalizacion: '.$item->getEndDateTime().'</dd>'.
				'<dd> Valor entrada: '.$cinema->getTicketValue().'</dd>'.
			'</dl>';		
			echo '<form action="'.FRONT_ROOT.'MovieFunction/RemoveDB">
	     	<button name="name" value="'.$item->getMovieFunctionId().'">Eliminar</button></form>';
		   
	*/}
	 }

		
		
		
}
echo '<form action="'.FRONT_ROOT.'Login/homeAdmin">
	<button>Volver</button></form>';
?>