@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-3 col-sm-4 offset-md-6 d-flex justify-content-end">
        <button class="btn border-dark  "data-toggle="modal" data-target="#myModal" style=" font-size: 1.5em;">Add New zip code</button>
      </div>
      <div class="col-md-3 col-sm-4">
        <input type="hidden" name="select" id="zip_code1" value="">
      
        <button class="btn border-dark" id='delete'style=" font-size: 1.5em;">Remove zip code</button>
      </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center" style="    padding-top: 3vh;">
     
      <h1 style="margin-bottom:3vh">Partners</h1> 
      <table class="table table-bordered">
        <thead>
          <tr>
            <th >No</th>
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
          <tr class="partner">
            <input type="hidden" name="partner_id" id="" value="{{$partner->id}}">    
            <th >{{$i++}}</th> 
                       
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
      <h1 style="margin-bottom:3vh">Zip code</h1>
      <div class="container">
        <div class="row">
        
            @php
              $j=1;
              $count=(int)(count($zip_show)/3);
              if(is_float(count($zip_show)/3)){
                $count=$count+1;
              }
            @endphp
              @if (count($zip_show)<3)
                <table class="table table-bordered">
                  <thead>
                    <tr>
                    {{-- @foreach ($zip_show as $zip_shows) --}}
                      <th scope="col">No</th>
                      <th scope="col">Zip code</th>
                    {{-- @endforeach     --}}
                  </tr>
                  </thead>
                  <tbody>
                   
                      @foreach ($zip_show as $zip_shows)
                      <tr class="select">
                        <th >{{$j++}}</th> 
                        <td class="select_id">{{$zip_shows->zip_code}}</td>
                      </tr>  
                      @endforeach   
                    
                    </tbody>
                  </table>
              @else
          
                <table class="table col-md-4 table-bordered">
                <thead>
                  <tr>
                    <th >No</th>
                    <th >Zip code</th>
                  </tr>
                </thead>
                <tbody>

                    @for ($i = 0; $i <  $count; $i++)
                    <tr class="select">
                      <th >{{$j++}}</th> 
                      <td class="select_id">{{$zip_show[$i]->zip_code}}</td>
                    </tr>  
                    @endfor
                  </tbody>
                </table>
                <table class="table col-md-4 table-bordered">
                  <thead>
                    <tr>
                      <th >No</th>
                      <th >Zip code</th>
                    </tr>
                  </thead>
                  <tbody>
                      @for ($i =  $count; $i <  $count*2; $i++)
                      <tr class="select">
                        <th >{{$j++}}</th> 
                        <td class="select_id">{{$zip_show[$i]->zip_code}}</td>
                      </tr>  
                      @endfor
                    
                    </tbody>
                </table>
                <table class="table col-md-4 table-bordered">
                  <thead>
                    <tr>
                      <th >No</th>
                      <th >Zip code</th>
                    </tr>
                  </thead>
                  <tbody>
                      @for ($i = $count*2; $i < count($zip_show); $i++)
                      <tr class="select">
                        <th >{{$j++}}</th> 
                        <td class="select_id">{{$zip_show[$i]->zip_code}}</td>
                      </tr>  
                      @endfor
                    </tbody>
                </table>
                @endif
        </div>
      </div>
    </div>
</div>

<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      {{-- <form action="{{ route('add_zip') }}" method="post">
        @csrf --}}
        <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add new Zip code</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <input type="hidden" name="partner_id" id="partner_id" value="{{$partner->id}}"> 
        <input type="hidden" name="partner_eamil" id="partner_eamil" value="{{$partner->email}}"> 
        <input type="hidden" name="partner_country" id="partner_country" value="{{$partner->google}}"> 
        <input type="text" name="zip_code" class="form-control" id='zip_code'>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" id="add_zip">Add</button>
        <button class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

      {{-- </form> --}}
      
    </div>
  </div>
</div>
  @endsection