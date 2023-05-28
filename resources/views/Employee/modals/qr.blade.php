<div class="modal fade" id="qrModal" tabindex="-1" aria-labelledby="qrModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="qrModal">{{ __('QR Petugas Loket') }}</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-center">
          
          <div>
            <img class="d-none qr" id="qr_1" src="data:image/png;base64,{{DNS2D::getBarcodePNG('https://advice-app-customer-git-master-muhammadnazhimmaulana.vercel.app/form/1', 'QRCODE', 5, 5)}}" alt="barcode" />
            <img class="d-none qr" id="qr_2" src="data:image/png;base64,{{DNS2D::getBarcodePNG('https://advice-app-customer-git-master-muhammadnazhimmaulana.vercel.app/form/2', 'QRCODE', 5, 5)}}" alt="barcode" />
            <img class="d-none qr" id="qr_3" src="data:image/png;base64,{{DNS2D::getBarcodePNG('https://advice-app-customer-git-master-muhammadnazhimmaulana.vercel.app/form/3', 'QRCODE', 5, 5)}}" alt="barcode" />
            <img class="d-none qr" id="qr_4" src="data:image/png;base64,{{DNS2D::getBarcodePNG('https://advice-app-customer-git-master-muhammadnazhimmaulana.vercel.app/form/4', 'QRCODE', 5, 5)}}" alt="barcode" />
            <img class="d-none qr" id="qr_5" src="data:image/png;base64,{{DNS2D::getBarcodePNG('https://advice-app-customer-git-master-muhammadnazhimmaulana.vercel.app/form/5', 'QRCODE', 5, 5)}}" alt="barcode" />
          </div>
          
          {{-- Button --}}
          <div class="mt-3">
            <a id="qr_link" href="/admin/employee/pdf/id_number" target="_blank"><button class="btn btn-primary">Print</button></a>
          </div>
      </div>
    </div>
  </div>