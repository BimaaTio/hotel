<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Kelola Data Kamar</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahKamar">
      Tambah Kamar
    </button>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="kamar" width="100%" cellspacing="0">
        <thead>
          <tr class="text-center">
            <th>Nama Kamar</th>
            <th>Jenis Kamar</th>
            <th>Fasilitas</th>
            <th>Gambar</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <tr class="text-center">
            <td>Presroom 1st</td>
            <td>President Class</td>
            <td>Paling Lengkap</td>
            <td>
              <img src="../assets/img/kamar.jpg" width="190" height="150" alt="gambar">
            </td>
            <td>
              <a href="#edit" class="mx-auto btn-sm btn-primary"><i class="fas fa-edit"></i></a>
              <a href="#edit" class="btn-sm btn-danger"><i class="fas fa-trash"></i></a>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Modal Tambah Kamar -->
<div class="modal fade" id="tambahKamar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Kamar</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputEmail4">Email</label>
              <input type="email" class="form-control" id="inputEmail4">
            </div>
            <div class="form-group col-md-6">
              <label for="inputPassword4">Password</label>
              <input type="password" class="form-control" id="inputPassword4">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputCity">City</label>
              <input type="text" class="form-control" id="inputCity">
            </div>
            <div class="form-group col-md-4">
              <label for="inputState">State</label>
              <select id="inputState" class="form-control">
                <option selected>Choose...</option>
                <option>...</option>
              </select>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Sign in</button>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>