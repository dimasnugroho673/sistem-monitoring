<div class="row">
  <div class="col-md-12">
    <div class="container">
      <div class="card mt-5">
        <div class="card-header">

          <?= $this->session->flashdata('status') ?>

          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addClientModal">
            Tambah Perangkat
          </button>

          <a href="javascript:;" class="btn btn-primary ml-1 btn-refresh" data-action="reload">
            Refresh
          </a>

          <br>

          <div class="form-group mt-3">
            <label for="">Filter gedung</label><br>
            <select class="custom-select col-md-4">
              <option selected onclick="window.location.replace('<?= site_url('client?gedung=') ?>')" <?= $this->input->get('gedung') == null ? "selected" : null;  ?>>Semua</option>
              <?php foreach ($gedungs as $g) : ?>
                <option onclick="window.location.replace('<?= site_url('client?gedung=' . $g->gedung) ?>')" <?= $this->input->get('gedung') == $g->gedung ? "selected" : null;  ?>><?= $g->gedung ?></option>
              <?php endforeach ?>
            </select>
          </div>



          <!-- <div class="heading-elements">
            <ul class="list-inline mb-0">
              <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
              <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
              <li><a data-action="close"><i class="ft-x"></i></a></li>
            </ul>
          </div> -->
        </div>
        <div class="card-body">
          <table class="table table-hover" id="dataClient">
            <caption>
              Di perbaharui manual pada <span id="refreshed_at"></span>
            </caption>
            <thead>
              <tr>
                <th>No</th>
                <th>IP</th>
                <th>Nama Client</th>
                <th>Gedung</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody id="show_data">

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addClientModal" tabindex="-1" role="dialog" aria-labelledby="addClientModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="<?= site_url('client/add') ?>" method="POST">
        <div class="modal-header">
          <h5 class="modal-title" id="addClientModalLabel">Tambah Perangkat</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="nama_client">Nama Client</label>
            <input type="text" class="form-control" id="nama_client" name="nama_client" placeholder="Nama client/perangkat" required>
          </div>
          <div class="form-group">
            <label for="ip">Alamat IP</label>
            <input type="text" class="form-control" id="ip" name="ip" placeholder="IP address" required>
          </div>
          <div class="form-group">
            <label for="gedung">Gedung</label>
            <input type="text" class="form-control" id="gedung" name="gedung" placeholder="Gedung A/B/C ..." required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Tambahkan</button>
        </div>
      </form>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="editClientModal" tabindex="-1" role="dialog" aria-labelledby="editClientModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="<?= site_url('client/edit') ?>" method="POST">
        <div class="modal-header">
          <h5 class="modal-title" id="editClientModalLabel">Edit Perangkat</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="hidden" class="form-control" id="id_client_edit" name="id_client" placeholder="Nama client/perangkat" required>
          <div class="form-group">
            <label for="nama_client">Nama Client</label>
            <input type="text" class="form-control" id="nama_client_edit" name="nama_client" placeholder="Nama client/perangkat" required>
          </div>
          <div class="form-group">
            <label for="ip">Alamat IP</label>
            <input type="text" class="form-control" id="ip_edit" name="ip" placeholder="IP address" required>
          </div>
          <div class="form-group">
            <label for="gedung">Gedung</label>
            <input type="text" class="form-control" id="gedung_edit" name="gedung" placeholder="Gedung A/B/C ..." required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary" id="btn_update">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="deleteClientModal" tabindex="-1" role="dialog" aria-labelledby="deleteClientModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="<?= site_url('client/delete') ?>" method="POST">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteClientModalLabel">Hapus Perangkat</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="hidden" class="form-control" id="id_client_delete" name="id_client" placeholder="Nama client/perangkat" required>
          <p>Ingin menghapus perangkat ini?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-danger" id="btn_delete">Hapus</button>
        </div>
      </form>
    </div>
  </div>
</div>


<script>
  $(document).ready(function() {
    window.setTimeout(function() {
      $(".alert").fadeTo(500, 0).slideUp(500, function() {
        $(this).remove();
      });
    }, 2000);
  });
</script>

<script>
  $(document).ready(function() {

    let params = '<?= $this->input->get('gedung') ?>';

    function show_data(params) {
      $.ajax({
        type: 'POST',
        url: '<?= site_url('client/list_client') ?>',
        async: true,
        data: {
          gedung: params
        },
        dataType: 'JSON',
        success: function(data) {
          let html = '';
          let i;
          let no = 1;
          for (i = 0; i < data.length; i++) {

            html += '<tr>' +
              '<td>' + no++ + '</td>' +
              '<td>' + data[i].ip + '</td>' +
              '<td>' + data[i].nama_client + '</td>' +
              '<td>' + data[i].gedung + '</td>' +
              '<td id="show_status">' + data[i].simbol +
              '</td>' +
              '<td>' +
              '<a href="javascript:;" class="btn btn-outline-info btn-xs client_edit mr-1" data-id="' + data[i].id_client + '">Edit</a>' +
              '<a href="javascript:;" class="btn btn-outline-danger btn-xs client_delete" data-id="' + data[i].id_client + '">Hapus</a>' +
              '</td>' +
              '</tr>';
          }
          $('#show_data').html(html);

        }

      });

    }


    function update_status() {
      $.ajax({
        type: 'get',
        url: '<?= base_url('client/update_status') ?>',
        success: function(data) {},
        error: function() {
          // alert("kesalahan server");
        }
      });
    }

    function addZero(i) {
      if (i < 10) {
        i = "0" + i;
      }
      return i;
    }

    function timeConv() {
      let d = new Date();
      let x = document.getElementById("demo");
      let h = addZero(d.getHours());
      let m = addZero(d.getMinutes());
      let s = addZero(d.getSeconds());
      return h + ":" + m + ":" + s;
    }

    $('.btn-refresh').on('click', function() {
      update_status();
      show_data(params);

      let refreshedAt = timeConv();

      localStorage.setItem('refreshed_at', refreshedAt);

      $('#refreshed_at').html(refreshedAt);


    })

    $('#refreshed_at').html(localStorage.getItem('refreshed_at'));

    show_data(params);


    setInterval(function() {
      show_data(params);
      update_status();
    }, 2000);

    $('#show_data').on('click', '.client_edit', function() {
      $('#editClientModal').modal('show');

      let idClient = $(this).data('id');

      $.ajax({
        type: 'POST',
        url: '<?= site_url('client/get_client') ?>',
        async: true,
        data: {
          id_client: idClient
        },
        dataType: 'JSON',
        success: function(data) {

          $('#id_client_edit').val(data.id_client);
          $('#nama_client_edit').val(data.nama_client);
          $('#ip_edit').val(data.ip);
          $('#gedung_edit').val(data.gedung);

        }

      });
    });

    $('#show_data').on('click', '.client_delete', function() {
      $('#deleteClientModal').modal('show');

      let idClient = $(this).data('id');

      $('#id_client_delete').val(idClient);
    });

  });
</script>