<template>
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">Entrevista al donante: <b>{{ data.fullName }}</b>.</h3>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-md-6">
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
				<div class="col-md-6">
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
				<div class="col-md-12 text-center" v-if="!this.$route.params.id2">
					<button class="btn btn-danger" onclick="javascript:history.back()"><i class="glyphicon glyphicon-remove"></i> Cancelar</button>
					<button class="btn btn-success" @click="register"><i class="glyphicon glyphicon-ok"></i> Registrar</button>
				</div>
				<div class="col-md-12 text-center" v-else>
					<button class="btn btn-danger" onclick="javascript:history.back()"><i class="glyphicon glyphicon-arrow-left"></i> Atras</button>
					<button class="btn btn-success" @click="register"><i class="glyphicon glyphicon-ok"></i> Actualizar</button>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		name: 'Interview',
		data() {
			return {
				questions: [],
				data: {
					fullName: ''
				}
			};
		},
		mounted() {
			$('body').addClass('sidebar-collapse');
			let data = '?interview=1';
			if (this.$route.params.id2) data += '&id=' + this.$route.params.id2;
			axios.get('/donant/' + this.$route.params.id + data)
			.then(response => {
				this.data = response.data.blooddonor;
				this.questions = response.data.questions;
				if (!this.$route.params.id2) for(let i in this.questions) this.questions[i].answer = true;
			})
			.catch(error => {
				toastr.error('Error al encontrar donante.');
				this.$router.push({ path: '/donantes' });
				setTimeout(() => { console.clear(); }, 100);
			});
		},
		methods: {
			register: function () {
				if (!this.$route.params.id2) {
					axios.post('/interview', { id: this.data.id, questions: this.questions })
					.then(response => {
						toastr.success('Entrevista Guardada');
						setTimeout(() => { this.$router.push({ path: '/donantes' }); }, 500);
					});
				} else {
					axios.put('/interview/' + this.data.id, { questions: this.questions })
					.then(response => {
						toastr.success('Entrevista Actualizada');
						setTimeout(() => { this.$router.push({ path: '/donantes' }); }, 500);
					});
				}
			}
		}
	}
</script>