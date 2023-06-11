@extends('Layout.main')

@section('container')

{{-- Remove Scroll bar --}}
<style>
    .board{
        overflow-x: hidden; /* Hide horizontal scrollbar */
    }
</style>

<div class="values">

    <div class="board">

        <div class="row">
            <div class="col-md-6">
                {{-- Chart This Month --}}
                <div class="border border-dark p-3 rounded" style="width: 350px; margin: auto; margin-bottom: 50px;">
                    <canvas id="thisMonthEvaluation"></canvas>

                {{-- Button --}}
                <a id="download-month"
                    download="Monthly Chart.jpg" 
                    href=""
                    class="btn btn-primary float-right bg-flat-color-1 d-none"
                    title="Descargar Gráfico">
                    <!-- Download Icon -->
                    <i class="fa fa-download"></i>
                 </a>
                </div>
            </div>
            <div class="col-md-6">
                {{-- Chart This Month --}}
                <div class="border border-dark p-3 rounded" style="width: 350px; margin: auto; margin-bottom: 50px;">
                    <canvas id="thisYearEvaluation"></canvas>

                    {{-- Button --}}
                    <a id="download-year"
                        download="Yearly Chart.jpg" 
                        href=""
                        class="btn btn-primary float-right bg-flat-color-1 d-none"
                        title="Descargar Gráfico">
                        <!-- Download Icon -->
                        <i class="fa fa-download"></i>
                    </a>
                </div>
            </div>
        </div>

        {{-- Words --}}
        <div style="width: 100%; text-align: justify;">
            {{ __('Diagram diatas menunjukkan hasil penilaian terhadap loket selama satu bulan ini dan juga tahun ini') }}
        </div>
    </div>
</div>

{{-- Charts --}}
@section('script')
    <script>
        // First Chart
        const labels = @json($labels_this_month);
        const trans = @json($total_score_this_month);

        // Second Chart
        const labels_yearly = @json($labels_this_year);
        const trans_yearly = @json($total_score_this_year);
    </script>
    <script src="{{ mix('/js/app.js') }}"></script>
@endsection

@endsection
