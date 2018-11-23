<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php 
    include_once('header.php'); 

	$sessao = $_GET["Sessao"];
	
	// Inicializa a sessão
    session_start();
    ?>

	<script src="../js/jq-ing-min.js"></script>
	
	<!-- Script que limita a quantidade de tipos de produtos que pode ser selecionada -->
	<script>
		$(document).ready(function() {
			// Variável com a quantidade máxima de pratos no pedido
			var itemCount = <?php echo $sessao; ?>;

			// Função chamada a cada click no formulário
			function validateForm() {
				var validItens = 0;

				// Loop que verifica cada input no formulário
				$.each($('#add_form').serializeArray(), function(i, field) {
					// Caso o input tenha um valor maior que zero é adicionado um ao valor da variável
					if (field.name !== 'Sessao' && parseInt($("#" + field.name).val()) > 0) {
						validItens++;
					}
				});

				/* Caso a quantidade de inputs com valor seja igual ao número de pratos os inputs sem
				   valor se tornam readonly */
				if (validItens === itemCount) {
					$.each($('#add_form').serializeArray(), function(i, field) {
						if (field.name !== 'Sessao' && parseInt($("#" + field.name).val()) > 0) {
							$("#" + field.name).prop('readonly', false);
						} else {
							$("#" + field.name).prop('readonly', true);
						}
					});
				} else {
					$("#refri").prop('readonly', false);
					$("#ag").prop('readonly', false);
					$("#sc").prop('readonly', false);
					$("#sbr").prop('readonly', false);
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
		<a class="logo">Escolha os Produtos (Máximo <?php 
		if($sessao <= 4){
			echo $sessao;
		}else{
			echo"4";
		}
		?> tipo(s)):</a>
        <nav class="right">
            <a href="pinicial.php">
                <button class="button reset">
                    <strong>Cancelar pedido</strong>
                </button>
            </a>
        </nav>
	</header>

	<section id="banner">
		<form id="add_form" action="previsao.php" method="get" autocomplete="off">
			<table class="center">
				<tr>
					<td class="coluna">
						Refrigerante
					</td>
					<td class="coluna">
						Água
					</td>
					<td class="coluna">
						Suco
					</td>
					<td class="coluna">
						Sobremesa
					</td>
				</tr>
				<tr>
					<td class="coluna">
						<!-- Refrigerante -->
						<div id="input-refri" class="quantity">
							<input id="refri" type="number"
							name="refri" min="0" max="5"
							step="1" value="0" default="0">
						</div>
					</td>

					<td class="coluna">
						<!-- Agua -->
						<div id="input-agua" class="quantity">
							<input id="ag" type="number"
								name="ag" min="0" max="5"
								step="1" value="0" default="0">
						</div>
					</td>

					<td class="coluna">
						<!-- Suco -->
						<div id="input-suco" class="quantity">
							<input id="sc" type="number"
								name="sc" min="0" max="5"
								step="1" value="0" default="0">
						</div>
					</td>

					<td class="coluna">
						<!-- Sobremesa -->
						<div id="input-sobremesa" class="quantity">
							<input id="sbr" type="number"
								name="sbr" min="0" max="5"
								step="1" value="0" default="0">
						</div>
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
	</section>

	<!-- Scripts -->
	<script src="../js/jquery-ing.js"></script>
	
	<img src="../img/PagkainLogo.PNG" alt="" class="left"/>
</body>