@extends('Layout.main')

@section('container')
<div class="values">

    <div class="board">


        {{-- Title --}}
        <h1 class="text-center mb-4">Petugas dengan Penilaian Terbaik</h1>
        {{-- Employee Table --}}
        <table class="table mt-4 text-center">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Skor</th>
              </tr>
            </thead>
            <tbody>
            @for ($i = 0; $i < count($people); $i++)
                <tr>
                    <th scope="row">{{ $i + 1}}</th>
                    <td>{{ $people[$i] }}</td>
                    <td>{{ $scores[$i] }}</td>
                </tr>
            @endfor
            </tbody>
          </table>
    </div>
</div>


@endsection
