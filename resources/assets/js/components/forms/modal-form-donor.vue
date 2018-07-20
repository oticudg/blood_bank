<template>
  <modal id="donor-form" w="lg">

    <template slot="modal-title">
      <span :class="'glyphicon glyphicon-' + formData.ico"></span>
      {{ formData.title }}
    </template>

    <template slot="modal-body">
      <div class="row">
        <div class="col-sm-10 col-sm-offset-1">

            <spinner v-if="!formData.ready"></spinner>
            <div v-else>
              <div class="row">
                <form clas s="form-horizontal" @submit.prevent="registrar" @keyup.enter="registrar">

                  <div class="col-md-6" v-for="input in entries.a">
                    <v-input :name="input" :required="input.required"
                            :readonly="input.readonly"
                            v-model="formData.data[input.id]"
                            :msg="msg[input.id]"
                            @input="formData.data[input.id] = arguments[0]">
                    </v-input>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="num_id" class="control-label">
                        <span class="fa fa-id-card"></span> Cédula:
                      </label>
                      <input id="num_id" type="text" required class="form-control" v-model="formData.data.num_id">
                      <small id="num_idHelp" class="form-text text-muted">
                        <span v-text="msg.num_id"></span>
                      </small>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="birthdate" class="control-label">
                        <span class="glyphicon glyphicon-email"></span> Fecha de nacimiento:
                      </label>
                      <v-datePicker v-model="formData.data.birthdate" :config="option"></v-datePicker>
                      <small id="birthdateHelp" class="form-text text-muted">
                        <span v-text="msg.birthdate"></span>
                      </small>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="sex" class="control-label">
                        <span class="glyphicon glyphicon-email"></span> Sexo:
                      </label>
                      <select id="sex" class="form-control" v-model="formData.data.sex" required="required">
                        <option value="">Seleccione el sexo</option>
                        <option value="M">Masculino</option>
                        <option value="F">Femenino</option>
                      </select>
                      <small id="sexHelp" class="form-text text-muted">
                        <span v-text="msg.sex"></span>
                      </small>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="email" class="control-label">
                        <span class="glyphicon glyphicon-email"></span> E-mail:
                      </label>
                      <input type="email" class="form-control" v-model="formData.data.email">
                      <small id="emailHelp" class="form-text text-muted">
                        <span v-text="msg.email"></span>
                      </small>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="blood_group" class="control-label">
                        <span class="glyphicon glyphicon-compressed"></span> Grupo sanguíneo:
                      </label>
                      <select id="blood_group" class="form-control" v-model="formData.data.blood_group_id">
                        <option :value="null">Seleccione el tipeaje</option>
                        <option v-for="d in data['bloodgroup']" :value="d.id" v-text="d.name"></option>
                      </select>
                      <small id="blood_groupHelp" class="form-text text-muted">
                        <span v-text="msg.blood_group"></span>
                      </small>
                    </div>
                  </div>

                  <div class="col-md-6" v-for="input in entries.b">
                    <v-input :name="input"
                            :readonly="input.readonly"
                            v-model="formData.data[input.id]"
                            :msg="msg[input.id]"
                            @input="formData.data[input.id] = arguments[0]">
                    </v-input>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="observation" class="control-label">
                        <span class="glyphicon glyphicon-email"></span> Observaciones:
                      </label>
                      <textarea id="observation" class="form-control" style="resize:none" rows="4" v-model="formData.data.observation">asddsa</textarea>
                      <small id="observationHelp" class="form-text text-muted">
                        <span v-text="msg.observation"></span>
                      </small>
                    </div>
                  </div>

                  <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-success" v-if="formData.form == 2"><span class="glyphicon glyphicon-saved"></span> Actualizar</button>
                  </div>
                </form>
              </div>

            </div>

        </div>
      </div>
    </template>

    <template slot="modal-btn">
      <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span> Cerrar</button>
      <button type="submit" class="btn btn-primary" @click="registrar"><span class="glyphicon glyphicon-saved"></span> Guardar</button>
    </template>

  </modal>
</template>

<script>
  import Modal from './../partials/modal.vue';
  import Input from './../partials/input.vue';
  import datePicker from 'vue-bootstrap-datetimepicker';

  export default {
    name: 'modal-form-donor',
    components: {
      'modal': Modal,
      'v-input': Input,
      'v-datePicker': datePicker,
    },
    props: ['formData'],
    data () {
      return {
        data: [],
        option: {
          format: 'YYYY-MM-DD',
          useCurrent: false,
          locale: moment.locale()
        },
        entries: {
          a: [
          {label: 'Nombre', id: 'name', icon: 'glyphicon glyphicon-compressed', required: true},
          {label: 'Apellido', id: 'last_name', icon: 'glyphicon glyphicon-compressed', required: true},
          ],
          b: [
          {label: 'Seleccione una ocupación', id: 'current_occupation', icon: 'glyphicon glyphicon-com  pressed'},
          {label: 'Lugar de Nacimiento', id: 'place_birthdate', icon: 'glyphicon glyphicon-com  pressed'},
          {label: 'Lugar donde vive', id: 'location_home', icon: 'glyphicon glyphicon-compressed'},
          {label: 'Telefono de casa', id: 'phone_home', icon: 'glyphicon glyphicon-compressed'},
          {label: 'Lugar de trabajo', id: 'location_work', icon: 'glyphicon glyphicon-compressed'},
          {label: 'Telefono de trabajo', id: 'phone_work', icon: 'glyphicon glyphicon-compressed'},
          {label: 'Profeción', id: 'profession', icon: 'glyphicon glyphicon-compressed'},
          {label: 'Telefono personal', id: 'phone_person', icon: 'glyphicon glyphicon-compressed'},
          ],
        },
        msg: {
          name: 'Nombre del donante.',
          last_name: 'Apellido del donante.',
          age: 'Edad.',
          num_id: 'Cedula de identidad.',
          email: 'Correo electronico.',
          current_occupation: 'Ocupación actual.',
          birthdate: 'Fecha de Nacimiento.',
          place_birthdate: 'Lugar de Nacimiento.',
          blood_type: 'Tipo de sangre.',
          location_home: 'Lugar actual donde reside',
          phone_home: 'Telefono de casa',
          location_work: 'Lugar donde trabaja',
          phone_work: 'Telefono del trabajo',
          profession: 'Profeción actual',
          phone_person: 'Telefono Personal',
          sex: 'Sexo del donante.',
          observation: 'Observaciones sobre el paciente'
        }
      };
    },
    mounted() {
      axios.post('get-data-donants')
      .then(response => {
        this.data = response.data;
      });
    },
    methods: {
      registrar: function (el) {
        this.restoreMsg(this.msg);
        if (this.formData.cond === 'create') {
          axios.post(this.formData.url, this.formData.data)
          .then(response => {
            toastr.success('Donante Registrado');
            this.$router.push({ name: 'donor.show', params: { id: response.data } });
            $('#donor-form').modal('hide');
          });
        } else {
          axios.put(this.formData.url, this.formData.data)
          .then(response => {
            toastr.success('Donante Actualizado');
            this.$emit('input');
            $('#donor-form').modal('hide');
          });
        }
      }
    }
  }
</script>