

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
            <form action="<?= base_url('cek/cekIp') ?>" method="GET">
					<div class="form-group">
						<label>IP</label>
						<input type="text" class="form-control" name="ip" required/>
					</div>

					<button class="btn btn-primary" type="submit">Kirim</button>
				</form>
            </div>
        </div>
    </div>
</div>

