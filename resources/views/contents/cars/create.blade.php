@extends('layouts.apps')

@section('contents')

<div class="container my-5">

    <form action="{{ route('car.store') }}" method="POST">

        <div class="row">

            @csrf

            <h3 class="mb-3">Create Car</h3>

            @include('includes.alerts')

            <div class="col-4">
                <div class="form-floating mb-3">
                    <select name="type" class="form-select" required>
                        <option value="Sedan">Sedan</option>
                        <option value="SUV">SUV</option>
                        <option value="Pickup Truck">Pickup Truck</option>
                    </select>
                    <label>Type</label>
                </div>
            </div>

            <div class="col-4">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="model" placeholder="Model" required>
                    <label>Model</label>
                </div>
            </div>

            <div class="col-4">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="year" placeholder="Year" required>
                    <label>Year</label>
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

            <div class="col-12">
                <button class="btn btn-success" type="submit">Save</button>
            </div>
            
        </div>

    </form>

</div>

@endsection