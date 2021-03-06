@extends('master')

@section('title')
	Evenement verwijderen
@endsection

@section('content')
<!-- Dit is het formulier voor het verwijderen van een evenement -->


<h1>Evenement verwijderen</h1>

<hr/>

@include ('errors.list')

{!! Form::open(['url' => 'events/'.$event->id, 'method' => 'DELETE']) !!}

	<p>Weet je zeker dat je het evenement {{ $event->naam }} ({{ $event->code }}) wil verwijderen? Hiermee worden alle gegevens en alle koppelingen met andere tabellen onherroepelijk gewist!</p>
	
	<div class="row">
		<div class="col-sm-6 form-group">
			{!! Form::submit('Verwijderen', ['class' => 'btn btn-danger form-control']) !!}
		</div>
	</div>
{!! Form::close() !!}

@endsection