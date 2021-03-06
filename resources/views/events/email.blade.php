@extends('master')

@section('title')
	Emailadressen {{$event->naam}}
@endsection

@section('content')

<h1>Emailadressen {{$event->naam}}</h1>

<hr/>

<h4>Leiding ({{$num['members']}})</h4>
<p>{{$email['members']}}</p>

<h4>Deelnemers ({{$num['kids']}})</h4>
<p>{{$email['kids']}}</p>

<h4>Ouders ({{$num['parents']}})</h4>
<p>{{$email['parents']}}</p>

@endsection