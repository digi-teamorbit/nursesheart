@extends('layouts.app')

@section('content')
    <div class="container-fluid bg-white mt-5">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box card">
                <div class="card-body">
                    <h3 class="box-title pull-left">Ambulance Booking #{{ $bookambulance->id }}</h3>
                    
                        <a class="btn btn-success pull-right" href="{{ url('/admin/book-ambulance') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $bookambulance->id }}</td>
                            </tr>
                            <tr><th> Facility Name </th><td> {{ $bookambulance->facility_name }} </td></tr>
                            <tr><th> Patient Name </th><td> {{ $bookambulance->patient_name }} </td></tr>
                            <tr><th> Address </th><td> {{ $bookambulance->address }} </td></tr>
                            <tr><th> City </th><td> {{ $bookambulance->city }} </td></tr>
                            <tr><th> State </th><td> {{ $bookambulance->state }} </td></tr>
                            <tr><th> Zip </th><td> {{ $bookambulance->zip }} </td></tr>
                            <tr><th> Phone Number </th><td> {{ $bookambulance->phone }} </td></tr>
                            <tr><th> Email </th><td> {{ $bookambulance->email }} </td></tr>
                            <tr><th> Date of Transport </th><td> {{ $bookambulance->date_of_transport }} </td></tr>
                            <tr><th> Time of Transport </th><td> {{ $bookambulance->time_of_transport }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.admin.footer')
</div>
@endsection

