@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center" style="    padding-top: 3vh;">
    
                <h1 style="margin-bottom:3vh">Search results (from parking lot register)</h1>           
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Number</th>
                        {{-- <th scope="col">Country</th> --}}
                        <th scope="col">Google address</th>
                        <th scope="col">Zip code</th>
                        {{-- <th scope="col">Street</th>
                        <th scope="col">City</th> --}}
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email Address</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Valid license plates</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      @php
                          $i=0;
                      @endphp
                      @foreach ($results as $result)
                      <tr class='select'>
                      <th scope="row">{{$i+1}}</th>                       
                        <td class="select_id">{{$result->id}}</td>
                        {{-- <td>{{$result->country}}</td> --}}
                        <td>{{$result->google}}</td>
                        <th>{{$result->zip_code}}</th>
                        {{-- <td>{{$result->street}}</td>
                        <td>{{$result->city}}</td> --}}
                        <td>{{$result->firstname}}</td>
                        <td>{{$result->lastname}}</td>
                        <td>{{$result->email}}</td>
                        <td>{{$result->phone}}</td>
                        <td>{{$result->valid_license}}</td>
                      </tr>     
                      @endforeach
                                       
                    </tbody>
                  </table>
      
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-2 offset-md-8">
            <form action="{{ route('newcase') }}" method="post">
              @csrf
              <input type="hidden" id="select" name ='select' value="">
              <button class="btn border-dark col-12" id='select_parking' style=" font-size: 1.5em;">Select</button>
            </form>
            
        </div>
    </div>
</div>

  @endsection