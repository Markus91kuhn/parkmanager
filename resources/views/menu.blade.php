@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="    margin-top: 7vh;">
        <div class="col-md-8 text-center">
            <h1>Home<br>Welcome,{{Auth::user()->name}}</h1>
            <div class="d-block" style="    margin-top: 7vh;">
                <a href="/active"class="d-block btn border-dark col-md-8 offset-md-2 mt-3"><h1>Active cases (map)</h1></a>
                <a href="/pending"class="d-block btn border-dark col-md-8 offset-md-2 mt-3"><h1>Pending</h1></a>
                <a href="/custome"class="d-block btn border-dark col-md-8 offset-md-2 mt-3"><h1>Customers/Parking lot</h1></a>
                <a href="/part_list"class="d-block btn border-dark col-md-8 offset-md-2 mt-3"><h1>Partners</h1></a>
                <a href="/ticket"class="d-block btn border-dark col-md-8 offset-md-2 mt-3"><h1>Ticket history</h1></a>
                @if (Auth::user()->admin=='admin')
                    <a href="/team"class="d-block btn border-dark col-md-8 offset-md-2 mt-3"><h1>Team</h1></a>
                @endif
                <a href="/"class="d-block btn border-dark col-md-8 offset-md-2 mt-5"><h1>Start</h1></a>
            </div>
         
        </div>
    </div>
</div>
@endsection
