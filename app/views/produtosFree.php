<?php foreach($produtos as $produto){ ?>
	
	Nome: <?= $produto['nome'] ?><br/>	

<?php }?>
<br/><br/>

Páginas: 

<?php for($i=1; $i<=$paginas; $i++){ 

	if($i == $valorPg){

	 	echo "[".$i."]";

	}else if($i == 1){

	 	echo '<a href="'.BASE_URL.'produtos/">['.$i.']</a>';	

	}else{
	 	echo '<a href="'.BASE_URL.'produtos/page/'.$i.'">['.$i.']</a>';	
	}
} ?>