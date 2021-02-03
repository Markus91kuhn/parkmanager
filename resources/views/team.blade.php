@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row">
      <div class="col-md-2 col-sm-4 offset-md-7 offset-sm-1">
        <a href="{{ route('Register') }}" class="btn border-dark " style=" font-size: 1.5em;">Create New</a>
      </div>
        <div class="col-md-3 col-sm-6">
            <form action="{{ route('show_zip') }}" method="post">
              @csrf
              <input type="hidden" name="select" id='select' value="">
            <button class="btn border-dark" id='show_zip'style=" font-size: 1.5em;">Show Zip code</button>
            </form>
            
        </div>
    </div>
</div> --}}
<div class="container">
    <div class="row justify-content-center" style="    padding-top: 3vh;">
     
      <h1 style="margin-bottom:3vh">Partners</h1>           
      <table class="table table-bordered text-center">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Name</th>
            <th scope="col">Email Address</th>
            <th scope="col">admin</th>
            <th scope="col">Approved</th>
          </tr>
        </thead>
        <tbody>
          @php
          $i=1;
          @endphp
          @foreach ($users as $user)
          <tr class="partner">
            <input type="hidden" name="partner_id" class="partner_id" value="{{$user->id}}">         
            <th scope="row">{{$i++}}</th> 
                       
              {{-- <td >{{$user->id}}</td> --}}
              <td>{{$user->name}}</td>
              <th>{{$user->email}}</th>
              <td>{{$user->admin}}</td>
              @if ($user->approved==1)
              <td><input class="comfirm" type="checkbox" checked></td>
              @else
              <td><input class="comfirm"  type="checkbox"></td>
              @endif
              
            </tr>  
            @endforeach                    
          </tbody>
        </table>
      
    </div>
    {{-- @foreach ($users as $user)
        {{$user->name}}
    @endforeach --}}
        
  

</div>

  @endsection