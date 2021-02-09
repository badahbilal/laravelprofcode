@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col">

                <div class="mt-4 mb-2 text-center display-3">
                    All offers
                </div>

               <div class="my-2">
                   <!-- Button trigger modal -->
                   <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                       Add Offer
                   </button>

                   <!-- Modal -->
                   <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                       <div class="modal-dialog" role="document">
                           <div class="modal-content">
                               <div class="modal-header">
                                   <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                       <span aria-hidden="true">&times;</span>
                                   </button>
                               </div>
                               <div class="modal-body">
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

                                   </form>
                               </div>
                               <div class="modal-footer">
                                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                   <button id="save_offer" type="submit" class="btn btn-primary">Submit Offer</button>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>



                <div style="display: none"  id="statusMessage" class="alert alert-success" role="alert">

                </div>

                <div>


                    @if(Session::has('messageAction'))
                        <div class="alert alert-info" role="alert">
                            {{ Session::get('messageAction') }}
                        </div>
                    @endif

                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">photo</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Details</th>
                            <th scope="col">Operations</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($offers as $offer)
                            <tr class="offerId_{{$offer->id}}">
                                <td>{{ $offer->id}}</td>
                                <td><img src="{{ asset($offer->photo)}}" width="50"/></td>
                                <td>{{ $offer->name}}</td>
                                <td>{{ $offer->price }}</td>
                                <td>{{ $offer->details }}</td>
                                <td>


                                    <a href="{{ route( 'ajax.offers.edit', ['id' => $offer->id])}}"
                                       class="btn btn-warning"> Edit</a>


                                    <button idoffer="{{$offer->id}}"
                                            class="delete-offer btn btn-danger"> delete
                                    </button>



                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')


    <script>


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

                    $("tbody").append("<tr class='offerId_" + data.offer.id +"'>" +
                        "<td>" +data.offer.id +"</td>" +
                        "<td><img src='http://professionalcode.local/" +data.offer.photo +"' width='50'/></td>" +
                        "<td>" +data.offer.name +"</td>" +
                        "<td>" +data.offer.price +"</td>" +
                        "<td>" +data.offer.details +"</td>" +
                        "<td>"+
                        "<a href='http://professionalcode.local/ajax-offers/edit/"+data.offer.id+"' class='btn btn-warning'> Edit</a> "+
                        "<button idoffer='" + data.offer.id + "' class='delete-offer btn btn-danger'> delete</button>"+
                        "</td>"+
                        "</tr>"
                        );
                    console.log(data.offer);
                },
                error : function(reject){

                }

            });
        });


        $(document).on('click', '.delete-offer', function (e) {

            e.preventDefault();

            var offerId  = $(this).attr('idoffer');
            $.ajax({
                type: 'post',
                url: "{{route('ajax.offers.delete')}}",
                data: {
                    '_token': "{{csrf_token()}}",
                    'id': offerId,
                },


                success: function (data) {

                    var msg = document.querySelector("#statusMessage");

                    if (data.status) {
                        msg.style.display = 'block'
                        msg.innerText = data.msg;
                    }

                    $(".offerId_"+offerId).remove();
                },
                error: function (reject) {

                    alert("An error occurred while updating offer data")
                }

            });
        });





    </script>

@endsection