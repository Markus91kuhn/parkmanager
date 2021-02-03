@extends('layouts.app')

@section('content')

 
    <div class="container text-center">
		<div class="notfound">
			<div class="notfound-404">
				<h1>Your input value have some problem </h1>
				<h4>There isnt {{$error}} matched with input value</h4>
				<p>Check your data again!	</p>
			</div>
			<a href="/">Homepage</a>
		</div>
	</div>
@endsection