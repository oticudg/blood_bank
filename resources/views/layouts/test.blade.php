@extends('layouts.app')

@section('head')
<link href="{{ asset('/adminlte/css/backend.css?version=' . config('frontend.version')) }}" rel="stylesheet">
@endsection

@section('footer')
<script src="{{ asset('/adminlte/js/backend.js?version='.config('frontend.version')) }}"></script>
@endsection

@section('end')
<body class="hold-transition {{ config('frontend.theme') }} sidebar-mini">

	<div id="app">
		@include('partials.header')
		@include('partials.sidebar')
		<div class="content-wrapper">
			<section class="content">
				Contenido
			</section>
		</div>
		@include('partials.footer')
	</div>

</body>
@endsection