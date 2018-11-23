<!DOCTYPE html>
<html lang="pt-br">
<head>
	<?php include_once('header.php'); ?>
    <?php include_once('open-database.php'); ?>
</head>

<body>
	<div class="row" style="text-align: center">
		<span class="register-title">
			Cadastro de Pedido
		</span>
	</div>
	<hr class="hr-separator">
	<div class="row" style="text-align: center">
		<p class="register-subtitle">Forneça os dados abaixo</p>
	</div>

	<!-- Formulário de cadastro de pedido -->
	<form action="insert-pedido.php" method="post" autocomplete="off">

		<!-- Massa -->
		Massa:
		<div>
			<span id="input-massa"></span>
			<select name="Massa">
				<option value=""></option>
				<option value="1">Capeletti de Carne</option>
				<option value="2">Capeletti de Queijo</option>
				<option value="3">Lasanha de Presunto e Queijo</option>
				<option value="4">Lasanha de Carne</option>
				<option value="5">Lasanha Quatro Queijos</option>
				<option value="6">Penne</option>
			</select>
		</div>
		<br>

		<!-- Modo de Preparo -->
		Modo de Preparo:
		<div >
			<span id="input-modo-preparo"></span>
			<select name="Modo_Preparo">
				<option value=""></option>
				<option value="1">Refogado Azeite</option>
				<option value="2">Refogado Manteiga</option>
				<option value="3">Gratinado</option>
			</select>
		</div>
		<br>

		<!-- Molho -->
		Molho:
		<div >
			<span id="input-molho"></span>
			<select name="Molho">
				<option value=""></option>
				<option value="1">Branco</option>
				<option value="2">Bolonhesa</option>
				<option value="3">Rose</option>
				<option value="4">Ao Sugo</option>
			</select>
		</div>
		<br>

		<!-- Bacon -->
		Bacon:
		<div >
			<span id="input-bacon"></span>
			<input type="number"
					name="Bacon" min="0" max="8"
					width="5px" default="0">
			&nbsp;

		<!-- Queijo Minas -->
			<span id="input-queijo-min"></span>
			Queijo Minas:
			<input type="number"
					name="Queijo_Min" min="0" max="8"
					width="5px" default="0">
		</div>
		<br>

		<!-- Queijo Parmesão -->
		Queijo Parmesão:
		<div >
			<span id="input-queijo-par"></span>
			<input type="number"
					name="Queijo_Par" min="0" max="8"
					width="5px" default="0">
			&nbsp;

		<!-- Ovo de Codorna -->
			<span id="input-ovo-codorna"></span>
			Ovo de Codorna:
			<input type="number"
					name="Ovo_Cod" min="0" max="8"
					width="5px" default="0">
		</div>
		<br>

		<!-- Alho Poro -->
		Alho Poro:
		<div >
			<span id="input-alho-poro"></span>
			<input type="number"
					name="Alho_Poro" min="0" max="8"
					width="5px" default="0">
			&nbsp;

		<!-- Presunto -->
			<span id="input-presunto"></span>
			Presunto:
			<input type="number"
					name="Presunto" min="0" max="8"
					width="5px" default="0">
		</div>
		<br>

		<!-- Peito de Peru -->
		Peito de Peru:
		<div >
			<span id="input-peito-peru"></span>
			<input type="number"
					name="Peito_Peru" min="0" max="8"
					width="5px" default="0">
			&nbsp;

		<!-- Frango -->
			<span id="input-frango"></span>
			Frango:
			<input type="number"
					name="Frango" min="0" max="8"
					width="5px" default="0">
		</div>
		<br>

		<!-- Tomate Cereja -->
		Tomate Cereja:
		<div >
			<span id="input-tomate-cer"></span>
			<input type="number"
					name="Tomate_Cer" min="0" max="8"
					width="5px" default="0">
			&nbsp;

		<!-- Camarao -->
			<span id="input-camarao"></span>
			Camarao:
			<input type="number"
					name="Camarao" min="0" max="8"
					width="5px" default="0">
		</div>
		<br>

		<!-- Produto -->
		Produto:
		<div >
			<span id="input-produto"></span>
			<select name="Produto">
				<option value=""></option>
				<option value="1">Refrigerante</option>
				<option value="2">Água</option>
				<option value="3">Suco</option>
				<option value="4">Sobremesa</option>
			</select>
			&nbsp;

		<!-- Qtd Produto -->
			<span id="input-qtd-prod"></span>
			Quantidade:
			<input type="number"
					name="Qtd_Produto" min="0" max="5"
					width="5px">
		</div>
		<br>

		<!-- Botão de envio -->
		<div class="row" style="margin-bottom:10px">
			<div class="col-xs-12">
				<button type="submit">
					Inserir <span class="fas fa-chevron-circle-right"></span>
				</button>
			</div>
		</div>
	</form>
</html>