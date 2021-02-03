@extends('layouts.app')

@section('content')
<div class="container-fluid text-center ">
    <h1>Active Cases</h1>
    <div class="row" style="">
        <div class="col-md-4 col-sm-4">
        <input type="hidden" name="latval" id="latval" value="{{$lat}}">
        <input type="hidden" name="lngval" id="lngval" value="{{$lng}}">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  {{-- <th scope="col">Street</th>
                  <th scope="col">City</th>
                  <th scope="col">Country</th> --}}
                  <th scope="col">Google address</th>
                  <th scope="col">Partner Name</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($case_show as $case_shows)
                    <tr class='show_data'>
                    <th class="select_id">{{$case_shows->id}}</th>
                    {{-- <td>{{$case_shows->street}}</td>
                    <td>{{$case_shows->city}}</td>
                    <td>{{$case_shows->country}}</td> --}}
                    <td>{{$case_shows->google}}</td>
                    <td>{{$case_shows->partner_name}}</td>
                    </tr>  
                    @endforeach                    
                  </tbody>
              </table>    
        </div>
        <div class="col-md-8 col-sm-8">   
             <div id="map" class="map mr-3" ></div> 
        </div>
    </div>
</div>
<input type="hidden" name="select" value="">
<script type="application/javascript">
  var zoom;
  var cityCircle;
  var latval,lngval;
  var googleadd=document.getElementsByClassName('autocomplete');
  function initMap() {

      var uluru = {lat: 52.52, lng: 13.41};
      zoom={zoom: 6, center: uluru};
      var latval=$('#latval').val();
      var lngval=$('#lngval').val();
      if(latval&&lngval){
        var map = new google.maps.Map(
              document.getElementById('map'), zoom);
        cityCircle = new google.maps.Circle({
                strokeColor: '#f70101',
                strokeOpacity: 1,
                strokeWeight: 2,
                fillColor: '#f70101',
                fillOpacity: 0.8,
                map: map,
                center: {lat: parseFloat(latval), lng:parseFloat(lngval)},
                radius: 1000
              });
      }else{
        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $.ajax({
            type: "post",
            url: "activecase",
            success: function(data) {
              latval=data.lat;
              lngval=data.lng;
              var map = new google.maps.Map(
                document.getElementById('map'), zoom);
              for (var lats in latval) {
                cityCircle = new google.maps.Circle({
                  strokeColor: '#f70101',
                  strokeOpacity: 1,
                  strokeWeight: 2,
                  fillColor: '#f70101',
                  fillOpacity: 0.8,
                  map: map,
                  center: {lat: parseFloat(latval[lats]), lng:parseFloat(lngval[lats])},
                  radius: 1000
                });
              }
            }
        });

      }
  }
</script>

@endsection