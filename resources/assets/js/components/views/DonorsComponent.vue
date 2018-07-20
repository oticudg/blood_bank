<template>
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">Tabla de Donantes: </h3>
			<button type="button"
			class="btn btn-default btn-xs"
			data-tool="tooltip"
			title="Registrar Donante"
			@click="openform('create')"
			v-if="can('donor.store')"><span class="glyphicon glyphicon-plus"></span></button>
			<router-link class="btn btn-default btn-xs"
			:to="{ name: 'donor.show', params: { id: id } }"
			v-show="id"
			data-tool="tooltip"
			title="Ver Donante"><span class="fa fa-eye"></span></router-link>
			<button type="button"
			class="btn btn-default btn-xs"
			data-tool="tooltip"
			title="Editar Donante"
			@click="openform('edit')"
			v-show="id"
			v-if="can('donor.update')"><span class="glyphicon glyphicon-edit"></span></button>
			<button type="button"
			class="btn btn-default btn-xs"
			data-tool="tooltip"
			title="Borrar Donante"
			@click="deleted('/donant/' + id, $children[2].get, 'fullName')"
			v-show="id"><span class="glyphicon glyphicon-trash"></span></button>
			<v-modal-form :formData="formData" @input="$children[2].get()"></v-modal-form>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-md-12">
					<v-table id="donant" :columns="tabla.columns" uri="/donant" @output="id = arguments[0]"></v-table>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	import Tabla from './../partials/table.vue';
	import Modal from './../forms/modal-form-donor.vue';

	export default {
		name: 'Donors',
		components: {
			'v-table': Tabla,
			'v-modal-form': Modal,
		},
		data() {
			return {
				id: 0,
				data: null,
				formData: {
					ready: true,
					title: '',
					url: '',
					ico: '',
					cond: '',
					form: false,
					data:  {}
				},
				tabla: {
					columns: [
					{ title: 'Nombre y Apellido', field: 'fullName', sort: 'name', sortable: true },
					{ title: 'Grupo Sanguineo', field: 'blood_group', sortable: true },
					{ title: 'Cédula', field: 'num_id', sortable: true },
					{ title: 'Sexo', field: 'sex', sortable: true },
					{ title: 'Edad', field: 'age', sort: 'birthdate', sortable: true },
					]
				}
			};
		},
		mounted() {
			$('body').removeClass('sidebar-collapse')
		},
		methods: {
			openform: function (cond, user = null) {
				this.formData.ready = false;
				if (cond == 'create') {
					this.formData.title = ' Registrar Donante.';
					this.formData.url = '/donant';
					this.formData.ico = 'plus';
					this.formData.form = false;
					this.formData.data = {
						name: '',
						age: '',
						birthdate: '',
						blood_group_id: null,
						current_occupation: '',
						email: '',
						last_name: '',
						location_home: '',
						location_work: '',
						name: '',
						num_id: '',
						observation: '',
						phone_home: '',
						phone_person: '',
						phone_work: '',
						place_birthdate: '',
						profession: '',
						sex: '',
					};
					this.formData.ready = true;
				} else if (cond == 'edit') {
					this.formData.url = '/donant/' + this.id;
					axios.get(this.formData.url)
					.then(response => {
						this.formData.ico = 'edit';
						this.formData.title = 'Editar Donante: ' + response.data.fullName;
						this.formData.data = response.data;
						this.formData.ready = true;
					});
				}
				$('#donor-form').modal('show');
				this.formData.cond = cond;
			}
		}
	}
</script>