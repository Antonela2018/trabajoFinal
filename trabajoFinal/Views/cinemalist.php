<?php
if($lista==false){
	echo '<script>alert("No hay cines en la base de datos");</script>';
}else{
	foreach($lista as $item){
		echo '<dl>'.
				'<dt> cinema: '.$item->getName().'<dt>'.
				'<dd> Address: '.$item->getAddress().'</dd>'.
				'<dd> Capacity: '.$item->getCapacity().'</dd>'.
				'<dd> Valor de la entrada: $'.$item->getTicketValue().'</dd>'.
				'<dd> Cinema ID:'.$item->getId().'</dd>'.
				'<form action="'.FRONT_ROOT.'cinema/RemoveDB">
				<button name="name" value="'.$item->getName().'">Eliminar</button></form>'.
				'<form action="'.FRONT_ROOT.'cinema/ShowUpdateCinema">
				<button name="name" value="'.$item->getName().'">Change</button>.
				</form>'.
				'<form action="'.FRONT_ROOT.'movieFunction/readOrderByCinemId">
                <button name="name" value="'.$item->getId().'">FUNCIONES</button>..
  				</form>'.
			'</dl>';
	}
}
echo '<form action="'.FRONT_ROOT.'Login/homeAdmin">
<button>Volver</button></form>';
?>