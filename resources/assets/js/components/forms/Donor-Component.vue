<template>
	<div class="box">
		<div class="box-header">
			<h3 class="box-title" v-if="!this.$route.params.id2">Nueva Entrevista al donante: <b>{{ data.fullName }}</b>.</h3>
			<h3 class="box-title" v-else>Actualizar Entrevista al donante: <b>{{ data.fullName }}</b>.</h3>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-md-6" v-if="page == 1">
					<table class="table table-condensed table-hover table-striped table-bordered">
						<thead>
							<tr>
								<th>N°</th>
								<th>Pregunta</th> 
								<th>Respuesta</th>
							</tr>
						</thead>
						<tbody>
							<tr v-for="(q, index) in questions" v-if="index < 18">
								<td>{{ index + 1 }}</td>
								<td>¿{{ q.question }}?</td> 
								<td>
									<div class="onoffswitch">
										<input type="checkbox" class="onoffswitch-checkbox" :id="'myonoffswitch-' + q.id" v-model="q.answer" @click="q.answer = !q.answer" :checked="q.answer">
										<label class="onoffswitch-label" :for="'myonoffswitch-'+q.id">
											<span class="onoffswitch-inner"></span>
											<span class="onoffswitch-switch"></span>
										</label>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="col-md-6" v-if="page == 1">
					<table class="table table-condensed table-hover table-striped table-bordered">
						<thead>
							<tr>
								<th>N°</th>
								<th>Pregunta</th> 
								<th>Respuesta</th>
							</tr>
						</thead>
						<tbody>
							<tr v-for="(q, index) in questions" v-if="index >= 18">
								<td>{{ index + 1 }}</td>
								<td>¿{{ q.question }}?</td> 
								<td>
									<div class="onoffswitch">
										<input type="checkbox" class="onoffswitch-checkbox" :id="'myonoffswitch-' + q.id" v-model="q.answer" @click="q.answer = !q.answer">
										<label class="onoffswitch-label" :for="'myonoffswitch-'+q.id">
											<span class="onoffswitch-inner"></span>
											<span class="onoffswitch-switch"></span>
										</label>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="col-md-12" v-if="page == 2">
					<div class="row">
						<div class="col-md-10 col-md-offset-1">

							<div class="col-md-3" v-for="input in entries.a">
								<v-input :name="input" :required="input.required"
								:readonly="input.readonly"
								:placeholder="input.placeholder"
								:type="input.type"
								v-model="donation[input.id2]"
								:msg="msg[input.id]"
								@input="donation[input.id2] = arguments[0]"></v-input>
							</div>

							<div class="col-md-3">
								<div class="form-group">
									<label for="blood_group_id" class="control-label">
										<span class="glyphicon glyphicon-inbox"></span> Tipeaje:
									</label>
									<select id="blood_group_id" required="true" class="form-control" v-model="donation.blood_group_id" disabled="">
										<option :value="null">No ha sido asigando</option>
										<option v-for="b in bloodgroup" :value="b.id" v-text="b.name"></option>
									</select>
									<small id="donationblood_group_idHelp" class="form-text text-muted">
										<span v-text="msg.blood_group_id"></span>
									</small>
								</div>
							</div>

							<div class="col-md-3">
								<div class="form-group">
									<label for="type_donation_id" class="control-label">
										<span class="glyphicon glyphicon-inbox"></span> Tipo de donación:
									</label>
									<select id="type_donation_id" required="true" class="form-control" v-model="donation.type_donation_id">
										<option :value="null">Seleccione el tipo</option>
										<option v-for="t in typedonation" :value="t.id" v-text="t.name"></option>
									</select>
									<small id="donationtype_donation_idHelp" class="form-text text-muted">
										<span v-text="msg.type_donation_id"></span>
									</small>
								</div>
							</div>

						</div>
					</div>
				</div>
				<div class="col-md-12 text-center">
					<button class="btn btn-danger" onclick="javascript:history.back()" v-if="page == 1 && this.$route.params.id"><i class="glyphicon glyphicon-remove"></i> Atras</button>
					<button class="btn btn-danger" onclick="javascript:history.back()" v-if="page == 1 && !this.$route.params.id"><i class="glyphicon glyphicon-remove"></i> Cancelar</button>
					<button class="btn btn-danger" @click="page = 1" v-if="page == 2"><i class="glyphicon glyphicon-arrow-left"></i> Atras</button>
					<button class="btn btn-success" @click="page = 2" v-if="page == 1"><i class="glyphicon glyphicon-ok"></i> Siguiente</button>
					<button class="btn btn-success" @click="register" v-if="page == 2 && !this.$route.params.id"><i class="glyphicon glyphicon-ok"></i> Guardar</button>
					<button class="btn btn-success" @click="register" v-if="page == 2 && this.$route.params.id"><i class="glyphicon glyphicon-ok"></i> Actualizar</button>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	import Input from './../partials/input.vue';

	export default {
		name: 'Interview',
		components: {
			'v-input': Input,
		},
		data() {
			return {
				page: 1,
				questions: [],
				bloodgroup: [],
				typedonation: [],
				donation: {
					blood_donor_id: this.$route.params.id,
					blood_group_id: null,
					serial: 'A-',
					weight: '',
					pulse: '',
					blood_pressure: '',
					temperature: '',
					height: '',
					type_donation_id: null,
					// interview: '',
					// location: '',
					// name_patient: '',
					// observation: '',
				},
				entries: {
					a: [
					{label: 'Serial Nº: H.C', id: 'donationserial', id2: 'serial', icon: 'glyphicon glyphicon-compressed', required: true, placeholder: 'A-'},
					{label: 'Peso (Kg)', id: 'donationweight', id2: 'weight', icon: 'glyphicon glyphicon-compressed', type: 'number'},
					{label: 'Pulso', id: 'donationpulse', id2: 'pulse', icon: 'glyphicon glyphicon-compressed', type: 'number'},
					{label: 'Tención Arterial', id: 'donationblood_pressure', id2: 'blood_pressure', icon: 'glyphicon glyphicon-compressed', placeholder: 'ejem: 105 - 135'},
					{label: 'Temperatura (C°)', id: 'donationtemperature', id2: 'temperature', icon: 'glyphicon glyphicon-compressed', type: 'number'},
					{label: 'Estatura (cm)', id: 'donationheight', id2: 'height', icon: 'glyphicon glyphicon-compressed', type: 'number'},
					],
				},
				msg: {
					donationserial: '.',
					donationweight: '.',
					donationpulse: '.',
					donationblood_pressure: '.',
					donationtemperature: '.',
					donationheight: '.',
					donationblood_group_id: '.',
					donationtype_donation_idHelp: '.',
				},
				data: {
					fullName: ''
				}
			};
		},
		mounted() {
			$('body').addClass('sidebar-collapse');
			let data = '';
			if (this.$route.params.id2) {data += '/' + this.$route.params.id2;}
			axios.post('/get-data-donation/' + this.$route.params.id + data)
			.then(response => {
				this.data = response.data.blooddonor;
				this.questions = response.data.questions;
				if (!this.$route.params.id2) {
					for(let i in this.questions) {
						this.questions[i].answer = true;
					}
				} else {
					this.donation = response.data.donation;
					this.donation.blood_group_id = response.data.blooddonor.blood_group_id;
				}
				this.bloodgroup = response.data.bloodgroup;
				this.typedonation = response.data.typedonation;
			})
			.catch(errors => {
				toastr.error('Error al encontrar donación.');
				this.$router.go(-1);
				setTimeout(() => { console.clear(); }, 100);
			});
		},
		methods: {
			register: function (el) {
				$(el.target).attr('disabled', 'disabled');
				this.restoreMsg(this.msg);
				if (!this.$route.params.id2) {
					axios.post('/donations', { id: this.data.id, donation: this.donation, questions: this.questions })
					.then(response => {
						$(el.target).removeAttr('disabled');
						toastr.success('Donación Registrada');
						setTimeout(() => { this.$router.push('/donante/' + this.data.id); }, 500);
					});
				} else {
					axios.put('/donations/' + this.$route.params.id2, { donation: this.donation, questions: this.questions })
					.then(response => {
						$(el.target).removeAttr('disabled');
						toastr.success('Donación Actualizada');
						setTimeout(() => { this.$router.push('/donante/' + this.data.id); }, 500);
					});
				}
			}
		}
	}
</script>