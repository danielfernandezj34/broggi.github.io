<template>
    <main>
        <div class="card mt-3">
            <div class="card-body mt-1">
                <h5 class="card-title" id="titol_incidencies">incidencies asignades</h5>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Buscar Incidencia" aria-label="Buscar Incidencia">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fal fa-search"> Buscar</i></button>
                </form>
                <table class="table mt-2">
                    <thead>
                        <tr>
                            <th scope="col">Numero</th>
                            <th scope="col">Telefon</th>
                            <th scope="col">Data</th>
                            <th scope="col">Hora</th>
                            <th scope="col">Descripcio</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="incidencia in incidencies" :key="incidencia.id">
                            <td>{{ incidencia.num_incident }}</td>
                            <td>{{ incidencia.telefon_alertant }}</td>
                            <td>{{ incidencia.data }}</td>
                            <td>{{ incidencia.hora }}</td>
                            <td>{{ incidencia.descripcio }}</td>
                            <td>
                                <button type="submit" class="btn btn-secondary btn-sm" @click="editIncidencia(incidencia)"><i class="far fa-edit"></i> Editar</button>
                                <button type="submit" id="botones" class="btn btn-danger btn-sm ml-1" @click="confirmarDelete(incidencia)"><i class="far fa-trash-alt"></i> Esborrar</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>


        <!-- Modal Borrar-->
        <div class="modal fade" id="modalBorrar" tabindex="-1" role="dialog" aria-labelledby="modalBorrarLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Esborrar Incidencia</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Estas segur d'esborrar l'incidencia {{ incidencia.num_incident }} ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="fas fa-times"></i> Tancar</button>
                        <button type="button" id="botonBorrar" class="btn btn-danger btn-sm" @click="borrarIncidencia()"><i class="far fa-trash-alt"></i> Esborrar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Insert/Update -->
        <div class="modal fade" id="modalIncidencia" tabindex="-1" role="dialog" aria-labelledby="modalBorrarLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 v-if="insert" class="modal-title" id="IncidenciaModalLabel">Introduir Incidencia</h5>
                        <h5 v-else class="modal-title" id="IncidenciaModalLabel">Modificar Incidencia</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group row">
                                <label for="num_incident" class="col-sm-2 col-form-label">num_incident</label>
                                <div class="col-sm-4">
                                    <input type="text" name="num_incident" id="num_incident" class="form-control" v-model="incidencia.num_incident">
                                </div>

                                <label for="hora" class="col-sm-2 col-form-label">Hora</label>
                                <div class="col-sm-4">
                                    <input type="text" name="hora" id="hora" class="form-control" v-model="incidencia.hora">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nom" class="col-sm-2 col-form-label">Descripcio</label>
                                <div class="col-sm-4">
                                    <input type="text" name="nom" id="nom" class="form-control" v-model="incidencia.descripcio">
                                </div>

                                <label for="cognom" class="col-sm-2 col-form-label">Telefon</label>
                                <div class="col-sm-4">
                                    <input type="text" name="cognom" id="cognom" class="form-control" v-model="incidencia.telefon_alertant">
                                </div>
                            </div>
                            <div class="form-group row">

                                <label for="data" class="col-sm-2 col-form-label">Data</label>
                                <div class="col-sm-4">
                                    <input type="text" name="data" id="data" class="form-control" v-model="incidencia.data">
                                </div>
                                <label for="data" class="col-sm-2 col-form-label">hora_activacio</label>
                                <div class="col-sm-4">
                                    <input type="text" name="data" id="data" class="form-control" v-model="Incidencia">
                                </div>


                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="fas fa-times"></i> Tancar</button>
                        <button v-if="insert" type="button" id="botonBorrar" class="btn btn-danger btn-sm" @click="insertIncidencia()">Afegir</button>
                        <button v-else type="button" id="botonBorrar" class="btn btn-danger btn-sm" @click="updateIncidencia()">Modificar</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>

<script>
    export default {
        data() {
            return{
                incidencies: [],
                incidencia: {
                    num_incident: '',
                    data: '',
                    hora: '',
                    nom: '',
                    telefon_alertant: '',
                    descripcio: ''

                },
                insert: false
            }

        },
        methods: {
            selectIncidencies(){
                let me = this;
                axios
                    .get('/incidencies')
                    .then(response => {
                        me.incidencies = response.data;
                    })
                    .catch(error => {
                        console.log(error)
                        this.errored = true;
                    })
                    .finally(() => this.loading = false)
            },
            insertIncidencia(){
                let me = this;
                axios
                    .post('/incidencies', me.incidencia)
                    .then(function(response){
                        me.selectIncidencies();
                        $('#modalIncidencia').modal('hide');
                    }).catch(function(error){
                        me.errorMessage = error.response.data.error;
                    })
            },
            editIncidencia(incidencia){
                this.insert = false;
                this.incidencia = incidencia;
                $('#modalIncidencia').modal('show')
            },
            updateIncidencia(){
                let me = this;
                axios
                    .put('/incidencies/'+ me.incidencia.id, me.incidencia)
                    .then(function(response){
                        me.selectIncidencies();
                        $('#modalIncidencia').modal('hide');
                    }).catch(function(error){
                        me.errorMessage = error.response.data.error;
                    })
            },
            confirmarDelete(incidencia){
                this.incidencia = incidencia;
                $('#modalBorrar').modal('show')
            },
            borrarCurs(){
                let me = this;
                axios
                    .delete('/incidencies/'+ me.incidencia.id)
                    .then(function(response){
                        me.infoMessage = response.data.missatge;
                        me.selectIncidencies();
                        $('#modalBorrar').modal('hide'); // CERRAR MODAL
                    }).catch(function(error){
                        me.errorMessage = error.response.data.error;
                        $('modalBorrar').modal('hide');
                    })
            },
        },
        created(){
            this.selectIncidencies();
        },
        mounted() {
            console.log('Component mounted.')
        }
    }

</script>
