<?php if($produtos == 0){echo "<div class='txtPgInvalido'>Página inválida</div>"; exit;} ?>

Produtos: <br/>

    <?php foreach($produtos as $produto){ ?>
		Nome: <?= $produto['nome'] ?> 
		<hr/>
	<?php }?>

<br/>
Total de páginas: 

<?php for($i=1; $i<=$totalPg; $i++) {?>
	<a href="<?php echo BASE_URL."restrito/produtos/".$i; ?>">[<?=$i?>]</a>
<?php }?>	