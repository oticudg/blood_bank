{{-- @auth --}}
<footer class="main-footer">
	<div class="row">
		<div class="col-md-10">
			<strong>Copyright &copy; {{ date('Y') }}. {!! config('frontend.credits') !!}</strong>. Todos los derechos reservados.
		</div>
			<div class="col-md-2">
			<b>Version</b> {{ config('frontend.version') }} | 
			Time:<b>{{ round(microtime(true) - LARAVEL_START, 6) }}s</b>
		</div>  
	</div>
</footer>
{{-- @endauth --}}
