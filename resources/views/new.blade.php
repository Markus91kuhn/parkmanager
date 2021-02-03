@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="    padding-top: 7vh;">
        <div class="col-md-8 text-center">           
                <h1 style="margin-bottom:10vh">New parking lot</h1>           
                    <form method="post" action="{{ route('newcase') }}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-3 ">
                                <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="" placeholder="firstname" required >
                                @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-3 ">
                                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" placeholder="lastname"  required >
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- <div class="form-group row">
                            <div class="col-md-6 offset-md-3 ">
                                <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" placeholder="country"  required >
                                @error('country')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-3 ">
                                <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" placeholder="city"  required >
                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-3 ">
                                <input id="street" type="text" class="form-control @error('street') is-invalid @enderror" name="street" placeholder="street"  required >
                                @error('street')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-3 ">
                                <input id="google" type="text" class="form-control @error('google') is-invalid @enderror" name="google" placeholder="Google address" required >
                                @error('google')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-3 ">
                                <input id="zip_code" type="text" class="form-control @error('zipcode') is-invalid @enderror" name="zip_code" placeholder="Zip code" required >
                                @error('zipcode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-3 ">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="Phone number"  required >
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-3 ">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" required >
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4 offset-md-4  ">
                                <button type="submit" class="btn border-dark col-8 rounded-0" >
                                   <h2 class="mb-0"> {{ __('Submit') }}
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
