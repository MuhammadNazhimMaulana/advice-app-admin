<div class="modal fade" id="qrModal" tabindex="-1" aria-labelledby="qrModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="qrModal">{{ __('QR Petugas Loket') }}</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-center">
          <img src="data:image/png;base64,{{DNS2D::getBarcodePNG('https://advice-app-customer-git-master-muhammadnazhimmaulana.vercel.app/', 'QRCODE', 5, 5)}}" alt="barcode" />
      </div>
    </div>
  </div>