@extends('layouts.app')

@section('content')
{{-- <div class="container">
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
</div> --}}

<div class="container">
    <div class="row justify-content-center" style="    padding-top: 3vh;">
     
      <h1 style="margin-bottom:3vh">Ticket</h1>   
      <input id="myInput" type="text" class="form-control" placeholder="Search..">        
      <table class="table table-bordered text-center">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Google address</th>
            <th scope="col">Zip code</th>
            <th scope="col">UZ</th>
            <th scope="col">Car Number</th>  
            <th scope="col">Car color</th>      
            <th scope="col">Car brand</th>
            <th scope="col">Partner name</th> 
            <th scope="col">User name</th> 
            <th scope="col">Underground car park</th>                
            {{-- <th scope="col">Country</th>
            <th scope="col">Street</th>
            <th scope="col">City</th>   --}}
          </tr>
        </thead>
        <tbody id="myTable">
          @php
          $i=1;
          @endphp
          @foreach ($ticket as $tickets)
          <tr class="select">
            <th style="display: none;" class="select_id">{{$tickets->id}} </th>     
            <th scope="row">{{$i++}}</th> 
                       
              <td>{{$tickets->google}}</td>
              <td>{{$tickets->zip_code}}</td>
              <th>{{$tickets->city_name}}</th>
              <td>{{$tickets->car_number}}</td>
              <td>{{$tickets->car_color}}</td>
              <td>{{$tickets->car_brand}}</td>
              <td>{{$tickets->partner_name}}</td>
              <td>{{$tickets->user_name}}</td>
              <td>{{$tickets->carpark}}</td>
              {{-- <td>{{$partner->street}}</td>
              <td>{{$partner->city}}</td> --}}
            </tr>  
            @endforeach                    
          </tbody>
        </table>
      
    </div>

</div>

  @endsection