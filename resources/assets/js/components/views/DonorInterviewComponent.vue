<template>
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">Entrevista al donante: <b>{{ data.fullName }}</b>.</h3>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-md-6">
					<table class="table table-condensed table-hover">
						<thead>
							<tr>
								<th>N°</th>
								<th>Pregunta</th> 
								<th>Respuesta</th>
							</tr>
						</thead>
						<tbody>
							<tr v-for="(q, index) in questions" v-if="index <18">
								<td>{{ index + 1 }}</td>
								<td>{{ q.question }}</td> 
								<td>si / no</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="col-md-6">
					<table class="table table-condensed table-hover">
						<thead>
							<tr>
								<th>N°</th>
								<th>Pregunta</th> 
								<th>Respuesta</th>
							</tr>
						</thead>
						<tbody>
							<tr v-for="(q, index) in questions" v-if="index >=18">
								<td>{{ index + 1 }}</td>
								<td>{{ q.question }}</td> 
								<td>si / no</td>
							</tr>
						</tbody>
					</table>
				</div>
				<!-- <p class="col-md-4" >{{ index + 1 }}: {{ q.question }}</p> -->
			</div>
		</div>
	</div>
</template>

<script>
	// import Tabla from './../partials/table.vue';
	// import Modal from './../forms/modal-form-donor.vue';


	export default {
		name: 'Interview',
		components: {
			// 'v-table': Tabla,
			// 'v-modal-form': Modal,
		},
		data() {
			return {
				// id: null,
				questions: [],
				data: {
					fullName: ''
				},
				formData: {
					// ready: true,
					// title: '',
					// url: '',
					// ico: '',
					// cond: '',
					// form: false,
					// data:  {}
				},
				tabla: {
					columns: [
					// { title: 'Nombre y Apellido', field: 'fullName', sort: 'name', sortable: true },
					// { title: 'Grupo Sanguineo', field: 'blood_group', sortable: true },
					// { title: 'Cédula', field: 'num_id', sortable: true },
					// { title: 'Sexo', field: 'sex', sortable: true },
					// { title: 'Edad', field: 'age', sort: 'birthdate', sortable: true },
					]
				}
			};
		},
		mounted() {
			$('body').addClass('sidebar-collapse')
			axios.get('/donant/' + this.$route.params.id + '?interview=1')
			.then(response => {
				this.data = response.data.blooddonor;
				this.questions = response.data.questions;
			});
		},
		methods: {
			openform: function (cond, user = null) {
				// this.formData.ready = false;
				if (cond == 'create') {
					// this.formData.title = ' Registrar Donante.';
					// this.formData.url = '/donant';
					// this.formData.ico = 'plus';
					// this.formData.form = false;
					// this.formData.data = {
					// 	name: '',
					// 	age: '',
					// 	birthdate: '',
					// 	blood_group: '',
					// 	current_occupation: '',
					// 	email: '',
					// 	last_name: '',
					// 	location_home: '',
					// 	location_work: '',
					// 	name: '',
					// 	num_id: '',
					// 	observation: '',
					// 	phone_home: '',
					// 	phone_person: '',
					// 	phone_work: '',
					// 	place_birthdate: '',
					// 	profession: '',
					// 	sex: '',
					// };
					// this.formData.ready = true;
				} else if (cond == 'edit') {
					// this.formData.url = '/donant/' + this.id;
					// axios.get(this.formData.url)
					// .then(response => {
					// 	this.formData.ico = 'edit';
					// 	this.formData.title = 'Editar Donante: ' + response.data.fullName;
					// 	this.formData.data = response.data;
					// 	this.formData.ready = true;
					// });
				}
				// $('#donor-form').modal('toggle');
				// this.formData.cond = cond;
			}
		}
	}
</script>