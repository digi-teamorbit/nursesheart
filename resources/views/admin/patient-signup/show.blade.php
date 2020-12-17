@extends('layouts.app')

@section('content')
    <div class="container-fluid bg-white mt-5">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box card">
                <div class="card-body">
                    <h3 class="box-title pull-left">Patient #{{ $patientsignup->id }}</h3>
                    
                        <a class="btn btn-success pull-right" href="{{ url('/admin/patient-signup') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $patientsignup->id }}</td>
                            </tr>

                            <tr><th> Type </th><td> {{ $patientsignup->type }} </td></tr>

                            <tr><th> Name </th><td>{{ $patientsignup->first_name }} {{ $patientsignup->last_name }}</td></tr>

                            <tr><th> Address </th><td> {{ $patientsignup->address }} </td></tr>

                            <tr><th> City </th><td> {{ $patientsignup->city }} </td></tr>

                            <tr><th> State </th><td> {{ $patientsignup->state }} </td></tr>

                            <tr><th> Zip </th><td> {{ $patientsignup->zip }} </td></tr>

                            <tr><th> Date of Birth </th><td> {{ $patientsignup->date_of_birth }} </td></tr>

                            <tr><th> Phone </th><td> {{ $patientsignup->phone }} </td></tr>

                            <tr><th> Ticket Number </th><td> {{ $patientsignup->ticket_number }} </td></tr>

                            @if($patientsignup->type=='Insured')

                            <tr><th> Insurance Company Name </th><td> {{ $patientsignup->insurance_company_name }} </td></tr>

                            <tr><th> Insurance Number </th><td> {{ $patientsignup->insurance_number }} </td></tr>

                            <tr><th> Group Number </th><td> {{ $patientsignup->group_number }} </td></tr>

                            <tr><th> Insurance Card </th><td> <a class="btn btn-success" href="{{ asset($patientsignup->insurance_card) }}" download="">Download</a></td></tr>


                            @else
                            <tr><th> SSN Number </th><td> {{ $patientsignup->ssn }} </td></tr>
                            @endif
                            

                            <tr><th> Driver's License </th><td> <a class="btn btn-success" href="{{ asset($patientsignup->driver_liscence) }}" download="">Download</a> </td></tr>

                            

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

