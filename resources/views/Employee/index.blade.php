@extends('Layout.main')

@section('container')
<div class="values">

    <div class="board">

        {{-- Sent Warn Done --}}
        @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @endif

        {{-- Title --}}
        <h1 class="text-center mb-4">Daftar Nama Petugas Loket</h1>

        {{-- Employee Table --}}
        <table class="table mt-4 text-center">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
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
                        <a href="/admin/employee/detail/{{ $employee->id }}"><button type="button" class="mt-2 btn btn-success"><i class="fas fa-info"></i></button></a>
                        <button type="button" class="btn btn-warning text-white button_warn mt-2" data-id="{{ $employee->id }}" data-bs-toggle="modal" data-bs-target="#warnModal"><i class="fas fa-exclamation-triangle"></i></button>
                    </td>
                </tr>
            @endforeach
            </tbody>
          </table>
    </div>
</div>

{{-- Modals --}}
@include('Employee.modals.warn')

@section('script')
    <script src="{{ asset('/JS/employee.js') }}"></script>
@endsection

@endsection
