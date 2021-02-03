@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center" style="    padding-top: 7vh;">
        <div class="col-md-8 text-center">           
                <h1 style="margin-bottom:10vh">New parking lot</h1>           
                    <form method="POST" action="{{ route('new_park') }}">
                        @csrf
                        <div class="form-group row ">
                            <div class="col-md-6">
                                <input type="text" class="form-control"name="firstname" class="col-5" value="" placeholder="First Name" required >
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control"name="lastname" class="col-5" value="" placeholder="Last Name" required >
                            </div>
                        </div>
                        <div class="form-group row ">
                            <div class="col-md-12">
                                <input type="text" id='google'class="form-control" name="google" class="col-5" value="" placeholder="Google Address" required >
                            </div>
                            {{-- <div class="col-md-6">
                                <input type="text" class="form-control"name="street" class="col-5" value="" placeholder="Street" required >
                            </div> --}}
                        </div>
                        {{-- <div class="form-group row ">
                            <div class="col-md-6">
                                <input type="text" class="form-control"name="country" class="col-5" value="" placeholder="Country" required >
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control"name="city" class="col-5" value="" placeholder="City" required >
                            </div>
                        </div> --}}
                        <div class="form-group row ">
                            <div class="col-md-6">
                                <input type="email" class="form-control"name="email" class="col-5" value="" placeholder="Email Address" required >
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control"name="phone_number" class="col-5" value="" placeholder="Phone Number" required >
                            </div>
                        </div>
                        <div class="form-group row ">
                            <div class="col-md-6">
                                <input type="text" class="form-control"name="zip_code" class="col-5" value="" placeholder="Zip code" required >
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control"name="valid" class="col-5" value="" placeholder="Valid license plates" required >
                            </div>
                        </div>
                        
                        <div class="form-group row mt-5">
                            <div class="col-md-4 offset-md-4  ">
                                <button type="submit" class="btn border-dark col-8 rounded-0" >
                                   <h2 class="mb-0"> {{ __('Submit') }}</h2>
                                </button>
                             
                            </div>
                        </div>
                    </form>
              
        </div>
    </div>
</div>
<script type="application/javascript">
    function initMap() {
        // Create the autocomplete object, restricting the search predictions to
        // geographical location types.
        autocomplete = new google.maps.places.Autocomplete(
            document.getElementById('google'), {types: ['geocode']}
            );
      }
      </script>
@endsection
