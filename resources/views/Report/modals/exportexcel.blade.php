<div class="modal fade" id="exportExcelModal" tabindex="-1" aria-labelledby="exportExcelModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exportExcelModal">{{ __('Export To Excel') }}</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="/admin/report/excel" method="post" target="_blank">
            @csrf
                <div class="mb-3">
                  <label for="date_excel" class="form-label">Tanggal</label>
                  <input class="date_excel form-control" type="date" placeholder="Silakan Pilih Tanggal" name="date_excel">
              </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary disabled" id="send_excel">Kirim</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
              </div>
          </form>
      </div>
    </div>
  </div>