@extends('layouts.apps')

@section('contents')

<div class="container my-5">

    <div class="row">

        @include('includes.alerts')

        <div class="col-12 text-end">
            <form action="{{ route('signout') }}" method="POST">
                @csrf
                <button type="submit" class='btn btn-danger mb-2'>Sign out</button>
            </form>
        </div>
        <div class="col-12 text-end">
            <a href="{{ route('car.create') }}" class="btn btn-primary">Add Car</a>
        </div>

        <div class="col-12">
            <div class="table-responsive my-3">
                <table id="cars-table" class="table">
                    <thead>
                        <tr>
                            <th>Type</th>
                            <th>Model</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</div>

@endsection

@section('scripts')

    <script>

        initializeTable()

        function initializeTable() {
            $('#cars-table').DataTable({
                processing: true,
                serverSide: true,
                destroy: true,
                ajax: "{{ route('car.table') }}",
                columns: [
                    { data: 'type_name', name: 'type' },
                    { data: 'model' },
                    { data: 'actions' }
                ]
            })
        }

        function deleteCar(id) {
            
            Swal.fire({
            title: 'Are you sure?',
            confirmButtonText: 'Yes',
            showCancelButton: true,
            }).then((result) => {
                
                if (result.isConfirmed) {

                    Swal.fire({
                        title: 'Processing request. Please wait',
                        didOpen: () => {
                            Swal.showLoading()
                        }
                    })
                
                    $.ajax({
                        url: "/car/" + id,
                        method: "POST",
                        data: {
                            '_token' : "{{csrf_token()}}",
                            '_method': "DELETE"
                        },
                        success: function(response){
                            Swal.fire({
                            title: 'Car deleted',
                            icon: 'success',
                            confirmButtonText: 'Yes',
                            }).then((result) => {
                                if(result)
                                    initializeTable()
                            });
                        }
                    })
                    
                } 

            })
        }

    </script>

@endsection