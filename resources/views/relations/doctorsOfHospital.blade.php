@extends('layouts.app')



@section('content')

    <div class="container mt-3" >
        <div class="row">
            <div class="col">
                <p class="h2">
                    Doctors Of {{$hospitalName}}
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
                        <th>title</th>
                        <th>Operations</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($doctors as $doctor)
                    <tr>
                        <td scope="row">{{$doctor->id}}</td>
                        <td>{{$doctor->name}}</td>
                        <td>{{$doctor->title}}</td>
                        <td>
                            <a href="{{route('doctor.services',$doctor->id)}}" class="btn btn-success">Show Services</a>
                        </td>
                    </tr>

                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    @stop