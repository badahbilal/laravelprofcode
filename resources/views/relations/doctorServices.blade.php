@extends('layouts.app')



@section('content')

    <div class="container mt-3" >
        <div class="row">
            <div class="col">
                <p class="h2">
                    Doctor {{$doctorServices->name}} Services {{$doctorServices->services->count()}}
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


                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($doctorServices->services) && $doctorServices->services->count()>0 )
                    @foreach($doctorServices->services as $service)
                    <tr>
                        <td scope="row">{{$service->id}}</td>
                        <td>{{$service->name}}</td>

                    </tr>

                        @endforeach
                        @endif
                    </tbody>
                </table>

            </div>
        </div>

        <div class="row">
            <div class="col-4">
                <form method="POST" action="{{route("saveServicesToDoctor")}}">

                    @csrf
                    {{--            <input type="hidden" name="_token" value="{{csrf_token()}}">--}}


                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Choose Doctor </label>
                        <select class="form-control" name="doctorId">
                            @foreach($doctors as $doctor)
                                <option value="{{$doctor->id}}">{{$doctor->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Choose Services</label>
                        <select multiple class="form-control" name="servicesIds[]">
                            @foreach($services as $service)
                                <option value="{{$service->id}}">{{$service->name}}</option>


                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit Offer</button>
                </form>
            </div>
        </div>
    </div>

    @stop