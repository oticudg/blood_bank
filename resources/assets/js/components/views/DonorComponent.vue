<template>
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">Donante: {{ data.fullName }}.</h3>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-xs-5 col-xs-offset-1" v-if="data">
					<p>Nombre: <b>{{ data.name }}</b>.</p>
					<p>Cédula: <b>{{ data.num_id }}</b>.</p>
					<p>Sexo: <b>{{ data.sex }}</b>.</p>
					<p>Profesion: <b>{{ data.current_occupation }}</b>.</p>
					<p v-if="data.blood_group">Grupo Sanguíneo: <b>{{ data.blood_group.name }}</b>.</p>
				</div>
				<div class="col-xs-5 col-xs-offset-1" v-if="data">
					<p>Apellido: <b>{{ data.last_name }}</b>.</p>
					<p>Email: <b>{{ data.email }}</b>.</p>
					<p>Fecha de Nacimiento: <b>{{ data.birthdate }}</b>.</p>
					<p>Telefono de casa: <b>{{ data.phone_home }}</b>.</p>
					<p>Telefono de trabajo: <b>{{ data.phone_work }}</b>.</p>
				</div>
				<div class="col-md-12">
					<hr>
					<h4 class="box-title">
						Donaciones Realizadas: 
						<button type="button"
						class="btn btn-default btn-xs"
						data-tool="tooltip"
						title="Nueva Donación"
						@click="interview(1)"
						v-if="can('donor.interview')"><span class="glyphicon glyphicon-plus"></span></button>
						<button type="button"
						class="btn btn-default btn-xs"
						data-tool="tooltip"
						title="Editar Donación"
						@click="interview(2)"
						v-if="can('donor.interviewEdit')"
						v-show="id"><span class="glyphicon glyphicon-edit"></span></button>
						<button type="button"
						class="btn btn-default btn-xs"
						data-tool="tooltip"
						title="Borrar Donación"
						@click="deleted('/donations/' + id + '?donor=' + data.id, $children[0].get, 'name')"
						v-show="id"><span class="glyphicon glyphicon-trash"></span></button>
					</h4>
					<v-table id="donation" :n="[5,10,15]" nc="5" :t_head="0" :columns="tabla.columns" uri="/donations" :uridata="this.$route.params.id" @output="id = arguments[0]"></v-table>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	import Table from './../partials/table.vue';

	export default {
		name: 'Donor',
		components: {
			'v-table': Table
		},
		data () {
			return {
				id: '',
				data: [],
				tabla: {
					columns: [
					{ title: 'Donacion', field: 'donation', sort: 'id', sortable: true },
					{ title: 'Serial', field: 'serial', sortable: true },
					{ title: 'Fecha', field: 'hour', sort: 'created_at', sortable: true },
					{ title: 'Año', field: 'year', sort: 'created_at', sortable: true },
					{ title: 'Observaciones', field: 'observation', sortable: true },
					]
				}
			};
		},
		mounted() {
			axios.get('/donant/' + this.$route.params.id)
			.then(response => {
				if (! response.data.blood_group_id) toastr.info('Al donante no se le ha registrado su Grupo Sanguíneo');	
				this.data = response.data;
			})
			.catch(errors => {
				toastr.error('Error al encontrar donante.');
				this.$router.go(-1);
				setTimeout(() => { console.clear(); }, 100);
			});
		},
		methods: {
			interview: function (val) {
				if (val == 1) {
					this.$router.push({ name: 'donor.interview', params: { id: this.data.id } });
				} else {
					this.$router.push({ name: 'donor.interviewEdit', params: { id: this.data.id, id2: this.id } });
				}
			}
		}
	}
</script>