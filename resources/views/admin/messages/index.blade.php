@extends('admin.layouts.admin')

@section('content')

    <div class="col-lg-12 grid-margin stretch-card">

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Message Records</h4>

                {{-- <p class="card-description"></code> --}}
                </p>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th> Name </th>
                        <th> Subject </th>
                        <th> Email </th>
                        <th> Message </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($messages as $review)
                        <tr>
                            <td> {{ $review -> name }} </td>
                            <td> {{ $review -> subject }} </td>
                            <td> {{ $review -> email }} </td>
                            <td>
                                <p class="text-wrap">
                                    {{ $review -> message }}
                                </p>
                            </td>
                        </tr>
                        <tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
