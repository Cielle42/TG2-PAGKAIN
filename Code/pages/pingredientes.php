<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php 
    include_once('header.php'); 
    
	$sessao = $_GET["Sessao"];
	
	// Inicializa a sessão
    session_start();

    $_SESSION['massa'][$sessao]        = $_GET["Massa"];
	$_SESSION['modo_preparo'][$sessao] = $_GET["Modo_Preparo"];
	?>

    <script src="../js/jq-ing-min.js"></script>

	<!-- Script que limita a quantidade total de ingredientes que pode ser selecionada -->
	<script>
		$(document).ready(function() {
			// Variável com a quantidade máxima de ingredientes
			var itemCount = 8;

			// Função chamada a cada click no formulário
			function validateForm() {
				var validItens = 0;

				// Loop que verifica cada input no formulário
				$.each($('#add_form').serializeArray(), function(i, field) {
					// Caso o input tenha um valor maior que zero o valor que ele contém é adicionado na variável
					if (field.name !== 'Sessao' && parseInt($("#" + field.name).val()) > 0) {
						validItens += parseInt($("#" + field.name).val());
					}
				});

				/* Caso a quantidade encontrada nos inputs for igual a máxima todos os inputs
				   se tornam readonly */
				if (validItens === itemCount) {
					$.each($('#add_form').serializeArray(), function(i, field) {
						$("#" + field.name).prop('readonly', true);
					});
				} else {
					$.each($('#add_form').serializeArray(), function(i, field) {
						$("#" + field.name).prop('readonly', false);
					});
				}
			}
			
			$('#add_form').click(function () {
				validateForm();
			});
		});
	</script>
</head>

<body>
	<header id="header">
        <a class="logo">Escolha os Ingredientes (Máximo 8):</a>
        <nav class="right">
			<a href="pinicial.php">
				<button class="button reset">
					<strong>Cancelar pedido</strong>
				</button>
			</a>
        </nav>
	</header>
	
	<!-- Formulário de seleção dos ingredientes -->
	<form id="add_form" action="pmolho.php" method="get" autocomplete="off">
		<table class="center">
			<tr>
				<!-- Bacon -->
				<td class="coluna">
					Bacon
				</td>
				<td class="coluna">
					<div id="input-bacon" class="quantity">
						<input id="Bacon" type="number"
						name="Bacon" min="0" max="8"
						step="1" value="0" default="0">
					</div>
				</td>

				<!-- Queijo Minas -->
				<td class="coluna">
					<div id="input-queijo-min" class="quantity">
						<input id="Queijo_Min" type="number"
						name="Queijo_Min" min="0" max="8"
						step="1" value="0" default="0">
					</div>
				</td>
				<td class="coluna">
					Queijo Minas
				</td>
			</tr>

			<tr>
				<!-- Queijo Parmesão -->
				<td class="coluna">
					Queijo Parmesão
				</td>
				<td class="coluna">
					<div id="input-queijo-par" class="quantity">
						<input id="Queijo_Par" type="number"
						name="Queijo_Par" min="0" max="8"
						step="1" value="0" default="0">
					</div>
				</td>

				<!-- Ovo de Codorna -->
				<td class="coluna">
					<div id="input-ovo-codorna" class="quantity">
						<input id="Ovo_Cod" type="number"
						name="Ovo_Cod" min="0" max="8"
						step="1" value="0" default="0">
					</div>
				</td>
				<td class="coluna">
					Ovo de Codorna
				</td>
			</tr>

			<tr>
				<!-- Alho Poro -->
				<td class="coluna">
					Alho Poró
				</td>
				<td class="coluna">
					<div id="input-alho-poro" class="quantity">
						<input id="Alho_Poro" type="number"
						name="Alho_Poro" min="0" max="8"
						step="1" value="0" default="0">
					</div>
				</td>

				<!-- Presunto -->
				<td class="coluna">
					<div id="input-presunto" class="quantity">
						<input id="Presunto" type="number"
						name="Presunto" min="0" max="8"
						step="1" value="0" default="0">
					</div>
				</td>
				<td class="coluna">
					Presunto
				</td>
			</tr>

			<tr>
				<!-- Peito de Peru -->
				<td class="coluna">
					Peito de Peru
				</td>
				<td class="coluna">
					<div id="input-peito-peru" class="quantity">
						<input id="Peito_Peru" type="number"
						name="Peito_Peru" min="0" max="8"
						step="1" value="0" default="0">
					</div>
				</td>
				
				<!-- Frango -->
				<td class="coluna">
					<div id="input-frango" class="quantity">
						<input id="Frango" type="number"
						name="Frango" min="0" max="8"
						step="1" value="0" default="0">
					</div>
				</td>
				<td class="coluna">
					Frango
				</td>
			</tr>

			<tr>
				<!-- Tomate Cereja -->
				<td class="coluna">
					Tomate Cereja
				</td>
				<td class="coluna">
					<div id="input-tomate-cer" class="quantity">
						<input id="Tomate_Cer" type="number"
						name="Tomate_Cer" min="0" max="8"
						step="1" value="0" default="0">
					</div>
				</td>

				<!-- Camarão -->
				<td class="coluna">
					<div id="input-camarao" class="quantity">
						<input id="Camarao" type="number"
						name="Camarao" min="0" max="8"
						step="1" value="0" default="0">
					</div>
				</td>
				<td class="coluna">
					Camarão
				</td>
			</tr>
		</table>

		<!-- Input oculto para Sessão -->
		<input type="hidden" name="Sessao" value="<?php echo $sessao; ?>">

		<!-- Footer -->
		<footer id="footer">
			<!-- Botão de envio -->
			<nav class="right">
				<button type="submit" class="button submit">
					Confirmar
				</button>
			</nav>
		</footer>
	</form>
	
	<!-- Scripts -->
    <script src="../js/jquery-ing.js"></script>

	<img src="../img/PagkainLogo.PNG" alt="" class="left"/>
</body>