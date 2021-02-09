@extends('layouts.app')



@section('content')

    <div class="container mt-3" >
        <div class="row">
            <div class="col">
                <p class="h2">
                    Hostpitals
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col">

                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Operations</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($hospitals as $hospital)
                    <tr>
                        <td scope="row">{{$hospital->id}}</td>
                        <td>{{$hospital->name}}</td>
                        <td>{{$hospital->address}}</td>
                        <td>
                            <a href="all_doctors_Of_Hospital/{{$hospital->id}}" class="btn btn-success">Show Doctors</a>
                            <a href="deleteHospital/{{$hospital->id}}" class="btn btn-danger">Delete Hospital</a>
                        </td>
                    </tr>

                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    @stop