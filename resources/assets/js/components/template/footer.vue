<template>
	<footer class="main-footer">
		<div class="row">
			<div class="col-md-10">
				<strong>Copyright &copy; {{ all.y }}. <span v-html="all.credits"></span></strong>. Todos los derechos reservados.
			</div>
			<div class="col-md-2">
				<span class="pull-right">
					<b>Version</b> {{ all.version }}
				</span>
			</div>
		</div>
	</footer>
</template>

<script>
	export default {
		name: 'v-footer',
		props: ['all']
	}
</script>
