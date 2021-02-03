@extends('layouts.app')

@section('content')
<div class="container-fluid text-center">
            <h1>Open new case</h1>
            <div class="row mt-5">
                <div class="col-md-3 border shadow bg-white p-3  rounded border-dark offset-md-1">
                    <h1 style="margin-bottom:3vh">Parking lot details</h1>           
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">item</th>
                            <th scope="col">value</th>                           
                          </tr>
                        </thead>
                        <tbody>   
                        <input type="hidden" name="zip_code" value="{{$results['zip_code']}}">
                              <tr>
                                <th scope="row">1</th>                       
                                <td class="parking_id">First Name</td>
                                <td>{{$results['firstname']}}</td>                            
                              </tr>     
                              <tr>
                                <th scope="row">2</th>                       
                                <td class="parking_id">Last Name</td>
                                <td>{{$results['lastname']}}</td>                            
                              </tr>     
                              {{-- <tr>
                                <th scope="row">3</th>                       
                                <td class="parking_id">Country</td>
                                <td>{{$results['country']}}</td>                            
                              </tr>     
                              <tr>
                                <th scope="row">4</th>                       
                                <td class="parking_id">City</td>
                                <td>{{$results['city']}}</td>                            
                              </tr>     
                              <tr>
                                <th scope="row">5</th>                       
                                <td class="parking_id">street</td>
                                <td>{{$results['street']}}</td>                            
                              </tr>      --}}
                              <tr>
                                <th scope="row">3</th>                       
                                <td class="parking_id">Google address</td>
                                <td>{{$results['googleadd']}}</td>                            
                              </tr> 
                              <tr>
                                <th scope="row">6</th>                       
                                <td class="parking_id">Zip code</td>
                                <td>{{$results['zip_code']}}</td>                            
                              </tr>     
                              <tr>
                                <th scope="row">7</th>                       
                                <td class="parking_id">Phone</td>
                                <td>{{$results['phone']}}</td>                            
                              </tr>     
                              <tr>
                                <th scope="row">8</th>                       
                                <td class="parking_id">Email</td>
                                <td>{{$results['email']}}</td>                            
                              </tr>     
                                
                         {{-- @endif   --}}
                        </tbody>
                      </table>
          
                </div>
                <div class="col-md-8 mt-5">  
                  <form action="{{ route('complete') }}" method="post">
                    @csrf
                    {{-- <input type="hidden" name="country" id="" value="{{$results['country']}} ">
                    <input type="hidden" name="city" id="" value="{{$results['city']}}">
                    <input type="hidden" name="street" id="" value="{{$results['street']}}"> --}}
                    <input type="hidden" name="google" id="" value="{{$results['googleadd']}}">
                    <input type="hidden" name="zip_code" id="" value="{{$results['zip_code']}}">
                      <div class="row mt-5">
                        <div class="col-md-10 offset-md-1 col-sm-10 offset-sm-1 border1 border-dark rounded  mt-5" style="padding: 0px;">
                            <div class="flux" style="display:flex;">
                                <div class="leftarea">
                                    <div class="">
                                        <img class="img-responsive"src="{{ url('/image/star.png') }}" style="width: 40px;margin-top: 17px;"alt="">
                                    </div>
                                    <div>
                                        <span style="width: 25px;
                                        height: 25px;
                                        border: 1px solid rgb(222, 222, 222);
                                        display: block;
                                        text-align: center;
                                        margin: 15px auto;
                                        background-color: #dddddd;"></span>
                                    </div>
                                </div>
                                <div class="rightarea ">
                                    <div class="d-flex justify-content-center align-items-center" style="height: 113px;">
                                        <div class="col-md-6">
                                            <input type="text" id="city-search" class="width140 common_input" name='city_name' value="">
                                            <div class="dropdown-menu dropdown-menu-right city_search">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="common_input width180 " name='car_numb' placeholder="Car Number">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>   
                    </div>
                    <div class="row mt-5">
                        <div class="col-md-8 offset-md-2 col-sm-10 offset-sm-1 " style="padding: 0px;">
                            <div class="row">
                                <div class="col-md-6 offset-md-1">
                                  <div class="col-md-11 common_input2">
                                    <input type="text" class="" name='car_color' style="width: 100%;
                                    font-size: 24px;" placeholder="Color">
                                  </div>
                                   <div class="col-md-11 mt-3 common_input2">
                                    <input type="text" class="" name='car_brand' style="width: 100%;
                                    font-size: 24px;" placeholder="Brand">
                                   </div>
                                   <div class="col-md-11 mt-3 common_input2 ">
                                    <input type="checkbox" class="d-inline" name='carpark' checked>
                                    <h4 class="d-inline ml-2" >tiefgarage</h4> 
                                   </div>
                                   
                                    
                                </div>
                                <div class="col-md-5 d-flex justify-content-center align-items-center">
                                    <button class="btn border-dark col-md-8" id='complete'>Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                  </form>
                      
            </div>
</div>

@endsection