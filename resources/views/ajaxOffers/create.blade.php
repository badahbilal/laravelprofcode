@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="offset-3 col-6">
            <div class="flex-center position-ref full-height">


                <div class="content">
                    <div class="title m-b-md">
                        Add your offer
                    </div>
                    <br>
                    <div style="display: none"  id="statusMessage" class="alert alert-success" role="alert">

                    </div>

                   {{-- @if(Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @endif--}}
                    <form id="offerForm" >

                        @csrf
                        {{--            <input type="hidden" name="_token" value="{{csrf_token()}}">--}}


                        <div class="form-group">
                            <label for="offerName">Offer Photo </label>
                            <input type="file" class="form-control" name="photo" id="offerName" aria-describedby="offerName" placeholder="Offer Name">

                            @error('photo')

                             <small class="form-text text-danger">{{$message}}</small>

                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="offerName">Offer Name </label>
                            <input type="text" class="form-control" name="name" id="offerName" aria-describedby="offerName" placeholder="Offer Name">

                            @error('name')

                            <small class="form-text text-danger">{{$message}}</small>

                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="offerPrice">Offer Price </label>
                            <input type="text" class="form-control" name="price" id="offrePrice" aria-describedby="offerPrice" placeholder="Offer Price ">
                            @error('price')

                            <small class="form-text text-danger">{{$message}}</small>

                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="offerDetails">Offer Details </label>
                            <input type="text" class="form-control" name="details" id="offerDetails" aria-describedby="offerDetails" placeholder="Offer Details">
                            @error('details')

                            <small class="form-text text-danger">{{$message}}</small>

                            @enderror
                        </div>
                        <button id="save_offer" type="submit" class="btn btn-primary">Submit Offer</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@section('script')


    <script>

        /*data : {
                    '_token' : csrf_token()--}}",
                    //'photo':    $("input[name='photo']").val(),
                    'name':     $("input[name='name']").val(),
                    'price':    $("input[name='price']").val(),
                    'details':  $("input[name='details']").val(),

                },
                data : $("form").serialize(),*/



        $(document).on('click','#save_offer',function(e){

            e.preventDefault();

            var formData = new FormData($('#offerForm')[0]);

            $.ajax({
                type: 'post',
                url : "{{route('ajax.offers.store')}}",
                enctype : "multipart/form-data",
                data : formData,
                processData : false,
                contentType : false,
                cache : false,

                success : function(data){
                    var msg = document.querySelector("#statusMessage");

                    if(data.status){
                        msg.style.display  = 'block'
                        msg.innerText = data.msg;
                    }
                },
                error : function(reject){

                }

            });
        })



    </script>

    @endsection