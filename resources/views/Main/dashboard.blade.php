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
                </div>
            </div>
            <div class="col-md-6">
                {{-- Chart This Month --}}
                <div class="border border-dark p-3 rounded" style="width: 350px; margin: auto; margin-bottom: 50px;">
                    <canvas id="thisYearEvaluation"></canvas>
                </div>
            </div>
        </div>

        {{-- Words --}}
        <div style="width: 100%;">
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dicta voluptas aut quisquam, placeat culpa doloremque consequatur corporis nisi quaerat cupiditate consequuntur neque. Sunt tempore culpa consequatur ab eligendi sequi reprehenderit minus recusandae, iure, distinctio cupiditate cum blanditiis unde atque tenetur, commodi soluta quas eius beatae exercitationem. Dolor, nulla, consectetur quidem beatae vitae ipsam fugiat eos recusandae veritatis, eum ipsa! Quod odio ipsa dignissimos similique quidem voluptates culpa ipsum dolore ea aliquid illo rem libero ullam quos, nemo quo molestias omnis. Molestias itaque voluptate eius eaque aspernatur tempore quisquam. Quam natus sapiente officiis tempora cupiditate quod excepturi. Aliquid atque nisi inventore.
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
