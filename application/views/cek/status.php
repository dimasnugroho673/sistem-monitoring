<div class="row">
	<div class="col-md-12">
		<div class="container">
			<div class="card mt-5">
				<div class="card-body">
					<div class="alert alert-info">Result connection : </div>

					<h3 id="please_wait_show" class="ml-1 my-3">Please wait...</h3>

					<table class="table table-bordered table-striped table-hover mt-3" id="dataIP">
						<tr>
							<td>IP</td>
							<td><span id="ip_show"></span></td>
						</tr>
						<tr>
							<td>Status</td>
							<td><span id="status_ip_show"></span></td>
						</tr>
						<tr>
							<td>Message</td>
							<td><span id="message_show"></span></td>
						</tr>
					</table>
				</div>
			</div>


		</div>
	</div>
</div>



<script>
	$(document).ready(function() {

		$('#dataIPlog').DataTable();

		let ipAddr = '<?= $this->input->get('ip') ?>';

		$('#dataIP').hide();

		setInterval(function() {

			$.ajax({
				url: '<?= site_url('cek/check_status_ip') ?>',
				data: {
					ip: ipAddr
				},
				dataType: 'json',
				method: 'post',
				success: function(data) {

					$('#dataIP').show(500);

					$('#please_wait_show').hide(300);


					$('#ip_show').html(data.ip);

					if (data.status == 'up') {
						$('#status_ip_show').html(data.status).removeClass('text-danger').addClass('text-success text-uppercase font-weight-bold');
						$('#message_show').html('Connection stable').removeClass('text-danger');
					} else {
						$('#status_ip_show').html(data.status).removeClass('text-success').addClass('text-danger text-uppercase font-weight-bold');
						$('#message_show').html("Connection lost! :((( . Please check your connection or check Access Poin connection!").addClass('text-danger');
					}


				}
			})
		}, 4000);

	});
</script>