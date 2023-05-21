@extends('Layout.main')

@section('container')
<div class="values">

    <div class="board">

        {{-- Title --}}
        <h1 class="text-center mb-4">Daftar Nama Petugas Loket</h1>

        {{-- Employee Table --}}
        <table class="table mt-4 text-center">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($employees as $employee)
                <tr>
                    <th scope="row">{{ $employee->id }}</th>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>
                        <a href="/admin/employee/detail/{{ $employee->id }}"><button type="button" class="btn btn-success">Detail</button></a>
                        <a href="/admin/employee/warn/{{ $employee->id }}"><button type="button" class="btn btn-warning text-white">Kirim Peringatan</button></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
          </table>
    </div>
</div>

@endsection
