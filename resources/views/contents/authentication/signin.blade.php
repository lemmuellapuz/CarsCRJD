@extends('layouts.apps')

@section('contents')

<div class="container my-5">

    <form action="{{ route('signin') }}" method="POST">

        <div class="row">

            @csrf

            <h3 class="mb-3">Sign in</h3>

            @include('includes.alerts')

            <div class="col-4">
                <div class="form-floating">
                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                    <label>Email <span class="text-danger">*</span> </label>
                </div>
            </div>
            <div class="col-4">
                <div class="form-floating">
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                    <label>Password <span class="text-danger">*</span> </label>
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

            <div class="col-12 mt-3">
                <input type="submit" class="btn btn-primary" value="Sign in">
            </div>

            <div class="col-12 mt-3">
                <a href="{{ route('signup.index') }}">Don't have an account? Click here</a>
            </div>
            
        </div>

    </form>

</div>

@endsection