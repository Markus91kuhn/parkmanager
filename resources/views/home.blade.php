@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="    margin-top: 14vh;">
        <div class="col-md-8 text-center">         
            <div class="col-ms-4 text-center" style="height: 20vh">
                <a href="/menu" class="btn border-dark rounded-30" style="height: 20vh;width: 190px;border: 2px solid transparent;border-radius:50% ">
                    <H1 style=" margin-top: 7vh;">Home</H1>
                </a>
            </div>
           
            <div class="d-block d-flex justify-content-around   " style="margin-top:10vh ">
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-6" style="margin-top: 2%">
                        <a href="/exist" class=" col-7 btn border-dark rounded-0" style="height: 20vh;border: 2px solid transparent; ">
                            <h1 style=" margin-top: 2vh;">Existing parking lot</h1>
                        </a>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6" style="margin-top: 2%">
                        <a href="/new" class=" col-7 btn border-dark rounded-0" style="height: 20vh;border: 2px solid transparent;">
                            <h1 style=" margin-top: 2vh;">New parking lot</h1>
                        </a>        
                    </div>

                </div>
                
                
            </div>
            
        </div>
    </div>
</div>
@endsection
