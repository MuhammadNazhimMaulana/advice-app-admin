<div class="modal fade" id="exportPdfModal" tabindex="-1" aria-labelledby="exportPdfModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exportPdfModal">{{ __('Export To PDF') }}</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="/admin/report/pdf" method="post" target="_blank">
            @csrf
                <div class="mb-3">
                  <label for="date_pdf" class="form-label">Tanggal</label>
                  <input class="date form-control" type="date" placeholder="Silakan Pilih Tanggal" name="date_pdf">
              </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary disabled" id="send_pdf">Kirim</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
              </div>
          </form>
      </div>
    </div>
  </div>