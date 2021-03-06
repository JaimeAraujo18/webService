<div class="page-content minheight">
	<div class="container">
		<div class="jumbotron bg-gray">
		<?php
		if (null == $this->session->userdata("nome")){
			redirect(base_url('/usuario'));
		}else{ 

			if(!isset($aviso)){
				$aviso[0]['titulo']="";
				$aviso[0]['texto']="";
				$aviso[0]['data_inicio']="";
				$aviso[0]['data_fim']="";
				$aviso[0]['bairro_id']="";
				$aviso[0]['cidade_id']="";
				$new="";
			}
		?>
				<h2 class="text-light display-4">Cadastro de Aviso:</h2>
			<div id="erroAviso" class="hidden col-md-12 alert alert-danger"><p>Selecione opções válidas</p></div>
				<hr class="my-4 bg-light">
				<form id="formAviso" action="<?php if(isset($new)){echo base_url('/aviso/novoAviso');}else{echo base_url('/aviso/updateAviso/'.$aviso[0]['id']);} ?>" method="post">
					<div class="form-group">
						<label class="text-light" for="titulo">Título do aviso:</label><br>
						<input type="text" class="form-controll col-md-12" id="titulo" name="titulo" required value="<?= $aviso[0]['titulo'] ?>">
					</div>
					<div class="form-group">
						<label class="text-light" for="texto">Texto:</label><br>
						<textarea type="text" maxlength="255" class="form-controll col-md-12" id="texto" name="texto" required><?= $aviso[0]['texto']?></textarea>
					</div>
					<div class="form-group">
						<label class="text-light" for="dataInicio">Data de início:</label><br>
						<input type="date" class="form-controll col-md-12" id="dataInicio" min="<?= $data ?>" name="dataInicio" placeholder="dd/mm/aaaa" required value="<?= $aviso[0]['data_inicio'] ?>">
					</div>
					<div class="form-group">
						<label class="text-light" for="dataFim">Data de Término:</label><br>
						<input type="date" class="form-controll col-md-12" id="dataFim" name="dataFim" min="<?= $data ?>" placeholder="dd/mm/aaaa" required value="<?= $aviso[0]['data_fim'] ?>">
					</div>
					<div class="form-controll">
						<label class="text-light" for="cidadeID">Nome da cidade:</label><br>
						<select class="col-md-12 form-controll" id="cidadeID" name="cidadeID" required>
						<?php if(isset($new)){echo "<option value'null' class='col-md-12 form-controll'>Selecione uma cidade</option>";}else{echo "<option value='".$bairro[0]['cidade_id']." class='col-md-12 form-controll'>Selecione uma cidade</option>";}
						foreach ($cidades as $cidade)
						{
							echo "<option value='".$cidade['id']."'>".$cidade['nome']."</option>";
						}
						?>
						</select>
					</div>
					<div class="form-group">
						<label class="text-light" for="bairroID">Nome do bairro:</label><br>
						<select class="col-md-12 form-controll" id="bairroID" name="bairroID" required>
						<?php if(isset($new)){echo "<option value'null' class='col-md-12 form-controll'>Selecione um bairro</option>";}else{echo "<option value='".$bairro[0]['bairro_id']." class='col-md-12 form-controll'>Selecione um bairro</option>";}
						foreach ($bairros as $bairro)
						{
							echo "<option class='cid-".$bairro['cidade_id']."' value='".$bairro['id']."'>".$bairro['nome']."</option>";
						}
						?>
						</select>
					</div><br>
					<button type="submit" class="btn btn-danger col-md-12">Enviar</button>
				</form>
		<?php } ?>
		</div>
	</div>
</div>
