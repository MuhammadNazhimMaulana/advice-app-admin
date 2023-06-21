@extends('Layout.main')

@section('container')
<div class="values">

    <div class="board">

        {{-- Title --}}
        <h1 class="text-center mb-2">Petugas dengan Penilaian Terbaik</h1>

        <form data-action="{{ url('/admin/employee-performance/change') }}" method="POST" id="update_performance">
          @csrf
          {{-- Choose Months --}}
          <select name="months" id="performance_months" class="form-select mt-4 mb-3 w-25" aria-label="Default select example">
            @for($i = 0; $i < count($months); $i++)
              @if($i == 0)
                <option value={{ $months[$i] }} selected>{{ $months[$i] }}</option>
              @else
                <option value={{ $months[$i] }}>{{ $months[$i] }}</option>
              @endif
            @endfor
          </select>
        </form>

        {{-- Employee Table --}}
        <table class="table mt-4 text-center" id="performance-table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Skor</th>
              </tr>
            </thead>
            <tbody>
            @for ($i = 0; $i < count($people); $i++)
                <tr class="replacement">
                    <th scope="row">{{ $i + 1}}</th>
                    <td>{{ $people[$i] }}</td>
                    <td>{{ $scores[$i] }}</td>
                </tr>
            @endfor
            </tbody>
          </table>
    </div>
</div>

@section('script')
    <script src="{{ asset('/JS/employee.js') }}"></script>
@endsection


@endsection
