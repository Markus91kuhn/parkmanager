@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-2 offset-md-10">
            <a href="/new_2" class="btn border-dark " style=" font-size: 1.5em;">Create New</a>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center" style="    padding-top: 3vh;">
    
                <h1 style="margin-bottom:3vh">Customers/Parking lot</h1>           
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Number</th>
                        {{-- <th scope="col">Country</th> --}}
                        
                        {{-- <th scope="col">Street</th>
                        <th scope="col">City</th> --}}
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Google address</th>
                        <th scope="col">Email Address</th>
                        <th scope="col">Zip code</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Valid license plates</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      @php
                      $i=1;
                      @endphp
                      @foreach ($parkings as $parking)
                      <tr>
                        <th scope="row">{{$i++}}</th>
                        <td>{{$parking->id}}</td>
                        {{-- <td>{{$parking->country}}</td> --}}
                       
                        {{-- <td>{{$parking->street}}</td> --}}
                        {{-- <td>{{$parking->city}}</td> --}}
                        <td>{{$parking->firstname}}</td>
                        <td>{{$parking->lastname}}</td>
                        <td>{{$parking->google}}</td>
                        <td>{{$parking->email}}</td>
                        <th>{{$parking->zip_code}}</th>
                        <td>{{$parking->phone}}</td>
                        <td>{{$parking->valid_license}}</td>
                      </tr> 
                      @endforeach                     
                    </tbody>
                  </table>
      
    </div>
</div>

  @endsection