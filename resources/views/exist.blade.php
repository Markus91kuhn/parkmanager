@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="    padding-top: 7vh;">
        <div class="col-md-8 text-center">           
                <h1 style="margin-bottom:10vh">Search existing parking lot</h1>           
                    <form method="POST" action="{{ route('exist') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-left">{{ __('First Name:') }}</label>
                            <div class="col-md-8">
                                <input id="firstname" type="text" class="form-control @error('name') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}"  autocomplete="firstname" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lastname" class="col-md-4 col-form-label text-md-left">{{ __('Last name:') }}</label>
                            <div class="col-md-8">
                                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" >
                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- <div class="form-group row">
                            <label for="country" class="col-md-4 col-form-label text-md-left">{{ __('Country:') }}</label>
                            <div class="col-md-8">
                                <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country"  >
                                @error('country')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-left">{{ __('City:') }}</label>
                            <div class="col-md-8">
                                <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city"  >
                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="street" class="col-md-4 col-form-label text-md-left">{{ __('Street:') }}</label>
                            <div class="col-md-8">
                                <input id="street" type="text" class="form-control @error('street') is-invalid @enderror" name="street"  >
                                @error('street')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}
                        <div class="form-group row">
                            <label for="parknumb" class="col-md-4 col-form-label text-md-left">{{ __('Google address:') }}</label>
                            <div class="col-md-8">
                                <input id="google" type="text" class=" form-control @error('google') is-invalid @enderror" name="google" placeholder="Google address">
                                @error('google')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="parknumb" class="col-md-4 col-form-label text-md-left">{{ __('Parking lot number:') }}</label>
                            <div class="col-md-8">
                                <input id="parknumb" type="text" class="form-control @error('parknumb') is-invalid @enderror" name="parknumb" >
                                @error('parknumb')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-left">{{ __('Phone number:') }}</label>
                            <div class="col-md-8">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone"  >
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-left">{{ __('Email:') }}</label>
                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn border-dark col-6 rounded-0" >
                                   <h2 class="mb-0"> {{ __('Search') }}
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
