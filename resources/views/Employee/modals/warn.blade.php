<div class="modal fade" id="warnModal" tabindex="-1" aria-labelledby="warnModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="warnModal">{{ __('Kirim Peringatan') }}</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="/admin/employee/warn" method="post">
            @csrf
                <div class="form-floating">
                    <textarea class="form-control" name="warn_message" placeholder="Silakan masukkan pesan tambahan" id="pesan" style="height: 100px"></textarea>
                    <label for="pesan">Pesan</label>
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Kirim</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
              </div>
          </form>
      </div>
    </div>
  </div>