@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-2 col-sm-4 offset-md-7 offset-sm-1">
        <a href="/new_part" class="btn border-dark " style=" font-size: 1.5em;">Create New</a>
      </div>
        <div class="col-md-3 col-sm-6">
            <form action="{{ route('show_zip') }}" method="post">
              @csrf
              <input type="hidden" name="select" value="">
            <button class="btn border-dark" id='show_zip'style=" font-size: 1.5em;">Show Zip code</button>
            </form>
            
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center" style="    padding-top: 3vh;">
     
      <h1 style="margin-bottom:3vh">Partners</h1>           
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Email Address</th>
            <th scope="col">Phone Number</th>  
            <th scope="col">Google address</th>                    
            {{-- <th scope="col">Country</th>
            <th scope="col">Street</th>
            <th scope="col">City</th>   --}}
          </tr>
        </thead>
        <tbody>
          @php
          $i=1;
          @endphp
          @foreach ($partners as $partner)
          <tr class="select">
            <th style="display: none;" class="select_id">{{$partner->id}} </th>     
            <th scope="row">{{$i++}}</th> 
                       
              <td>{{$partner->firstname}}</td>
              <td>{{$partner->lastname}}</td>
              <th>{{$partner->email}}</th>
              <td>{{$partner->phone}}</td>
              <td>{{$partner->google}}</td>
              {{-- <td>{{$partner->country}}</td>
              <td>{{$partner->street}}</td>
              <td>{{$partner->city}}</td> --}}
            </tr>  
            @endforeach                    
          </tbody>
        </table>
      
    </div>

</div>

  @endsection