@extends('layout')

@section('content')
    <h1>Selling your Home?</h1>

    <hr>

    <form class="form-group" action="/flyers" method="POST" enctype="multipart/form-data">

        @include('flyers.form')

    </form>
@stop
