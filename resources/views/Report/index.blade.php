@extends('Layout.main')

@section('container')
<div class="values">

    <div class="board">

        {{-- Title --}}
        <h1 class="text-center mb-4">Hasil Penilaian</h1>

        {{-- Buttons --}}
        <button  type="button" class="ms-1 btn btn-danger" data-bs-toggle="modal" data-bs-target="#exportPdfModal"><i class="fas fa-file-pdf"></i></button>
        <button  type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exportExcelModal"><i class="fas fa-file-excel"></i></button>

        {{-- Employee Table --}}
        <table class="table mt-4 text-center">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Skor</th>
                <th scope="col">Komentar</th>
              </tr>
            </thead>
            <tbody>
            @for ($i = 0; $i < count($comments); $i++)
                <tr>
                    <th scope="row">{{ ($comments->currentpage()-1)*$comments->perpage() + 1 + $i}}</th>
                    <td>{{ $comments[$i]->employer->name }}</td>
                    <td>{{ $comments[$i]->score }}</td>
                    <td>{{ $comments[$i]->advice == null ? __('Tidak ada komentar') : $comments[$i]->advice }}</td>
                </tr>
            @endfor
            </tbody>
          </table>
    </div>

    {{-- Pagination --}}
    <div class="d-flex justify-content-center w-100">
      {{ $comments->links() }}
    </div>
</div>

{{-- Modals --}}
@include('Report.modals.exportpdf')
@include('Report.modals.exportexcel')

@section('script')
    <script src="{{ asset('/JS/report.js') }}"></script>
@endsection

@endsection