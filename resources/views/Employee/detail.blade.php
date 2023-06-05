@extends('Layout.main')

@section('container')
<div class="values">

    <div style="margin-top: -20px;" class="board">

        {{-- Button Back --}}
        <a class="btn btn-primary" href="/admin/employee">{{ __('Kembali ke Daftar') }}</a>

        {{-- Title --}}
        <h1 class="text-center mb-4">{{ $employee->name }}</h1>

        {{-- Diagram --}}
        <div class="border border-dark p-3 rounded" style="width: 350px; margin: auto; margin-bottom: 50px;">
            <canvas id="transactionChart"></canvas>
        </div>

        {{-- Description --}}
        <div style="width: 100%; text-align: justify;">
            {{ $desc }}
        </div>
    </div>
</div>

{{-- Charts --}}
@section('script')
    <script>
        const labels = @json($labels);
        const trans = @json($total_score);
    </script>
    <script src="{{ mix('/js/app.js') }}"></script>
@endsection

@endsection
