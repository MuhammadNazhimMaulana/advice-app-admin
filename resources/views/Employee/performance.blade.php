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
              @if($months[$i] == \Carbon\Carbon::now()->format('F'))
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
                <th scope="col">Kriminal</th>
                <th scope="col">Tidak Puas</th>
                <th scope="col">Sesuai Janji</th>
                <th scope="col">Memuaskan</th>
                <th scope="col">Recommended</th>
                <th scope="col">Total</th>
              </tr>
            </thead>
            <tbody>
            @for ($i = 0; $i < count($people); $i++)
                <tr class="replacement">
                    <th scope="row">{{ $i + 1}}</th>
                    <td>{{ $people[$i] }}</td>
                    <td>{{ array_key_exists(strtolower($people[$i]).'_'.__('kriminal'), $detail) ? $detail[strtolower($people[$i]).'_'.__('kriminal')] : 0 }}</td>
                    <td>{{ array_key_exists(strtolower($people[$i]).'_'.__('tidak_puas'), $detail) ? $detail[strtolower($people[$i]).'_'.__('tidak_puas')] : 0 }}</td>
                    <td>{{ array_key_exists(strtolower($people[$i]).'_'.__('sesuai_janji'), $detail) ? $detail[strtolower($people[$i]).'_'.__('sesuai_janji')] : 0 }}</td>
                    <td>{{ array_key_exists(strtolower($people[$i]).'_'.__('memuaskan'), $detail) ? $detail[strtolower($people[$i]).'_'.__('memuaskan')] : 0 }}</td>
                    <td>{{ array_key_exists(strtolower($people[$i]).'_'.__('recommended'), $detail) ? $detail[strtolower($people[$i]).'_'.__('recommended')] : 0 }}</td>
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
