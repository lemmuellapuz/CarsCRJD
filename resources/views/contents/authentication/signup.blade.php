@extends('layouts.apps')

@section('contents')

<div class="container my-5">

    <form action="{{ route('signup') }}" method="POST">

        <div class="row">

            @csrf

            <h3 class="mb-3">Sign up</h3>

            @include('includes.alerts')

            <div class="col-12">
                <div class="form-floating my-1">
                    <input type="text" class="form-control" name="name" placeholder="name" required>
                    <label>Name <span class="text-danger">*</span> </label>
                </div>
            </div>
            <div class="col-4">
                <div class="form-floating my-1">
                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                    <label>Email <span class="text-danger">*</span> </label>
                </div>
            </div>
            <div class="col-4">
                <div class="form-floating my-1">
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                    <label>Password <span class="text-danger">*</span> </label>
                </div>
            </div>
            <div class="col-4">
                <div class="form-floating my-1">
                    <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                    <label>Confirm Password <span class="text-danger">*</span> </label>
                </div>
            </div>

            @if ($errors->all())

                <div class="col-12">
                    <ul class="text-danger">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                
            @endif

            <div class="col-4">
                <input type="submit" class="btn btn-primary my-1" value="Sign up">
            </div>
            
        </div>

    </form>

</div>

@endsection