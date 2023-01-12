<!-- BEGIN FOOTER -->
<div class="footer">
	<div class="footer-inner">
		2022 &copy; Multidados TI.
	</div>
	<div class="footer-tools">
		<span class="go-top">
			<i class="fa fa-angle-up"></i>
		</span>
	</div>
</div>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<script src="assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="assets/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery.cockie.min.js" type="text/javascript"></script>
<script src="assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="assets/scripts/app.js" type="text/javascript"></script>
<script src="assets/scripts/index.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
	jQuery(document).ready(function() {
		App.init(); // initlayout and core plugins
		Index.init();

		$("#clientes").click(function() {
			console.log('deve deixar a tabela azul clientes')
			changeColorTable('blue');
			getData('clientes')
		})

		$("#usuarios").click(function() {
			console.log('deve deixar a tabela verde usuário')
			changeColorTable('green');
			getData('usuario')
		})

		$("#fornecedores").click(function() {
			console.log('deve deixar a tabela roxo fornecedores')
			changeColorTable('purple');
			getData('fornecedores')
		})
	});

	function changeColorTable(color) {
		$('.portlet-body').removeClass('blue green purple').addClass(color);
	}

	function getData(data) {
		$.ajax({
			url: "script.php",
			type: "get",
			data: "param=" + data,
			dataType: "json"
		}).done(function(resposta) {
			createTable(resposta)
		}).fail(function(jqXHR, textStatus) {
			console.log("Request failed: " + textStatus);
		}).always(function() {
			console.log("completou");
		});
	}

	function createTable(data) {
		$('.table').empty();

		var heads = Object.keys(data[0]);
		var html = '<thead><tr>';
		$.each(heads, function() {
			html += '<th>' +  this + '</th>';
		});

		html += '<tbody>';

		for (i = 0, len = heads.length; i < len; i++) {
			html += '<tr>';
			$.each(data[i], function(k, v) {
				html += '<td>' + v + '</td>';
			});
			html += '</tr>';
		}
		html += '</tbody>';
		$('.table').append(html);
	}
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->

</html>