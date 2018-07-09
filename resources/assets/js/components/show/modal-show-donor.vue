<template>
  <modal id="donor-show" w="lg">

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
              <div class="col-md-6">
                <p>Nombre y Apellido: <b>{{ formData.data.fullName }}</b>.</p>
                <p>Cédula: <b>{{ formData.data.num_id }}</b>.</p>
                <p>Sexo: <b>{{ formData.data.sex }}</b>.</p>
                <p>Profesion: <b>{{ formData.data.current_occupation }}</b>.</p>
                <p>Grupo Sanguíneo: <b>{{ formData.data.blood_group }}</b>.</p>
              </div>
              <div class="col-md-6">
                <p>Email: <b>{{ formData.data.email }}</b>.</p>
                <p>Fecha de Nacimiento: <b>{{ formData.data.birthdate }}</b>.</p>
                <p>telefono de casa: <b>{{ formData.data.phone_home }}</b>.</p>
                <p>telefono de trabajo: <b>{{ formData.data.phone_work }}</b>.</p>
              </div>

              <div class="col-md-12">
                <hr>
                <h3 class="box-title">Tabla de entrevistas realizadas: </h3>
                <button type="button"
                class="btn btn-default btn-xs"
                data-tool="tooltip"
                title="Nueva Entrevista"
                @click="new_interview"
                v-if="can('donor.interview')"><span class="glyphicon glyphicon-plus"></span></button>
                <button type="button"
                class="btn btn-default btn-xs"
                data-tool="tooltip"
                title="Editar Entrevista"
                @click="edit_interview"
                v-if="can('donor.interviewEdit')"
                v-show="id"><span class="glyphicon glyphicon-edit"></span></button>
                <button type="button"
                class="btn btn-default btn-xs"
                data-tool="tooltip"
                title="Borrar Entrevista"
                @click="deleted('/interview/' + id + '?donor=' + formData.data.id, $children[0].$children[0].get, 'name')"
                v-show="id"><span class="glyphicon glyphicon-trash"></span></button>
                <v-table id="interview" :n="[5,10,15]" nc="5" :t_head="0" :columns="tabla.columns" uri="/interview" :uridata="formData.data.id" @output="id = arguments[0]"></v-table>
              </div>
            </div>
          </div>

        </div>
      </div>
    </template>

    <template slot="modal-btn">
      <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span> Cerrar</button>
    </template>

  </modal>
</template>

<script>
  import Modal from './../partials/modal.vue';
  import Tabla from './../partials/table.vue';

  export default {
    name: 'modal-show-donor',
    components: {
      'modal': Modal,
      'v-table': Tabla
    },
    props: ['formData'],
    data () {
      return {
        id: '',
        tabla: {
          columns: [
          { title: 'Entrevista', field: 'interview', sortable: true },
          { title: 'Fecha', field: 'hour', sort: 'created_at', sortable: true },
          { title: 'Año', field: 'year', sort: 'created_at', sortable: true },
          ]
        }
      };
    },
    updated () {
      $('[data-tool="tooltip"]').tooltip();
    },
    methods: {
      new_interview: function () {
        this.$router.push({ name: 'donor.interview', params: { id: this.formData.data.id } });
        $('#donor-show').modal('hide');
      },
      edit_interview: function () {
        this.$router.push({ name: 'donor.interviewEdit', params: { id: this.formData.data.id, id2: this.id } });
        $('#donor-show').modal('hide');
      }
    }
  }
</script>