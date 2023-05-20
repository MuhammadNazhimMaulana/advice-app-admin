@extends('Layout.main')

@section('container')
<div class="values">

    <div class="board">
        <div class="card mx-auto">
            <div class="card-body">
                <h5 class="card-title text-center">{{ $user->name }}</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>

                {{-- Update Form --}}
                <form action="/user/profile" method="post" id="update_form">

                    {{-- Username --}}
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" data-initial="{{ $user->username }}" value="{{ $user->username }}" class="form-control" id="username" name="username" readonly>
                    </div>

                    {{-- Email --}}
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" data-initial="{{ $user->email }}"  value="{{ $user->email }}" class="form-control" id="email" name="email">
                    </div>

                    {{-- Password --}}
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>

                    {{-- Password Confirmation --}}
                    <div class="mb-3 d-none" id="confirm_pass">
                        <label for="password_confirmation " class="form-label">Password</label>
                        <input type="password" class="form-control" id="password_confirmation " name="password_confirmation ">
                    </div>

                    <button class="btn btn-primary d-none" type="submit" id="button-update">
                        Submit
                    </button>
                </form>
            </div>
          </div>
    </div>
</div>

@section('script')
    {{-- Script --}}
    <script src="{{ asset('JS/profile.js') }}"></script>
@endsection

@endsection
