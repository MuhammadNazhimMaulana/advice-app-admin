@extends('Layout.main')

@section('container')
<div class="values">

    <div class="board">

        {{-- Title --}}
        <h1 class="text-center mb-4">Hasil Penilaian</h1>

        {{-- Buttons --}}
        <a class="btn btn-danger" href="/admin/report/pdf" target="_blank">{{ __('PDF') }}</a>
        <a class="btn btn-success" href="/admin/report/excel">{{ __('Excel') }}</a>

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
                    <th scope="row">{{ $i + 1}}</th>
                    <td>{{ $comments[$i]->employer->name }}</td>
                    <td>{{ $comments[$i]->score }}</td>
                    <td>{{ $comments[$i]->advice == null ? __('Tidak ada komentar') : $comments[$i]->advice }}</td>
                </tr>
            @endfor
            </tbody>
          </table>
    </div>
</div>


@endsection
