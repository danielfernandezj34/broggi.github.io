<template>
    <main>
        <div class="card mt-3 mb-3">

            <div class="card-header bg-primary text-white">
            <h5 class="card-title" id="titol_form">Recursos</h5>
            </div>

            <div class="card-body ">
                <form>
                    <table class="table mt-2">
                        <thead>
                            <tr>
                                <th scope="col">Codi</th>
                                <th scope="col">Actiu</th>
                                <th scope="col">Tipus recurs</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="recurso in recursos" :key="recurso.id">
                                <td>{{ recurso.codi }}</td>
                                <td>{{ recurso.actiu }}</td>
                                <div v-for="tipusRecurs in tipusRecursos" :key="tipusRecurs.id">
                                    <td v-if="recurso.tipus_recursos_id == tipusRecurs.id">
                                            {{ tipusRecurs.tipus }}
                                    </td>
                                </div>
                                <td>
                                    <button type="submit" id="botones" class="btn btn-danger btn-sm float-right" @click="confirmarDelete(recurso)"><i class="far fa-trash-alt"></i> Esborrar</button>
                                    <button type="button" class="btn btn-secondary btn-sm mr-1 float-right" @click="editRecurs(recurso)"><i class="far fa-edit"></i> Editar</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>

        <a @click="crearRecurs()" id="botoCrear"><i class="far fa-plus-circle fa-3x"></i></a>

        <!-- Modal Borrar-->
        <div class="modal fade" id="modalBorrar" tabindex="-1" role="dialog" aria-labelledby="modalBorrarLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Esborrar Recurs</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Estas segur d'esborrar el recurs {{ recurso.codi }} ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="fas fa-times"></i> Tancar</button>
                        <button type="button" id="botonBorrar" class="btn btn-danger btn-sm" @click="borrarRecurs()"><i class="far fa-trash-alt"></i> Esborrar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Insert/Update -->
        <div class="modal fade" id="modalRecurs" tabindex="-1" role="dialog" aria-labelledby="modalBorrarLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 v-if="insert" class="modal-title" id="RecursModalLabel">Introduir Recurs</h5>
                        <h5 v-else class="modal-title" id="RecursModalLabel">Modificar Recurs</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group row">
                                <label for="id_recurs" class="col-sm-3 col-form-label" id="id_recurs">Id del recurs</label>
                                <div class="col-sm-3">
                                    <input type="number" name="id_recurs" class="form-control" id="id_recurs" placeholder= "Número d'Incidencia" min="0" disabled v-model="recurso.id">
                                </div>

                                <label for="actiu" class="col-sm-1 col-form-label">Actiu</label>
                                <div class="col-sm-1 mt-2">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="actiu" name="actiu" v-model="recurso.actiu">
                                        <label class="custom-control-label" for="actiu"></label>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group row">
                                <label for="codi" class="col-sm-3 col-form-label" >Codi del recurs</label>
                                <div class="col-sm-3">
                                    <input type="text" name="codi" class="form-control" id="codi" placeholder= "Codi" v-model="recurso.codi">
                                </div>
                                <label for="tipus_recursos" class="col-sm-2 col-form-label">Tipus de recurs</label>
                                <div class="col-sm-3">
                                    <select name="tipus_recursos" id="tipus_recursos" class="custom-select" v-model="recurso.tipus_recursos_id">
                                        <option v-if="insert" selected disabled>Seleccionar...</option>
                                        <option v-for="tipusRecurso in tipusRecursos" :key="tipusRecurso.id" v-bind:value="tipusRecurso.id">{{ tipusRecurso.tipus }}</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="fas fa-times"></i> Tancar</button>
                        <button v-if="insert" type="button" id="botonBorrar" class="btn btn-danger btn-sm" @click="insertRecurs()">Afegir</button>
                        <button v-else type="button" id="botonBorrar" class="btn btn-danger btn-sm" @click="updateRecurs()">Modificar</button>
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
                recursos: [],
                recurso: {
                    id: '',
                    codi: '',
                    actiu: '',
                    tipus_recursos_id: ''
                },
                recursVacio: {
                    id: '',
                    codi: '',
                    actiu: '',
                    tipus_recursos_id: ''
                },
                tipusRecursos: [],
                insert: false
            }

        },
        methods: {
            selectRecursos(){
                let me = this;
                axios
                    .get('/recursos')
                    .then(response => {
                        me.recursos = response.data;
                    })
                    .catch(error => {
                        console.log(error)
                        this.errored = true;
                    })
                    .finally(() => this.loading = false)
                    let me2 = this;
                    axios
                        .get('/tipusRecursos')
                        .then(response => {
                            me2.tipusRecursos = response.data;
                        })
                        .catch(error => {
                            console.log(error)
                            this.errored = true;
                        })
                        .finally(() => this.loading = false)
            },
            crearRecurs(){
                this.insert = true;
                this.recurso = this.recursVacio;
                $('#modalRecurs').modal('show')
            },
            insertRecurs(){
                let me = this;
                axios
                    .post('/recursos', me.recurso)
                    .then(function(response){
                        me.selectRecursos();
                        $('#modalRecurs').modal('hide');
                    }).catch(function(error){
                        me.errorMessage = error.response.data.error;
                    })
            },
            editRecurs(recurso){
                this.insert = false;
                this.recurso = recurso;
                $('#modalRecurs').modal('show')
            },
            updateRecurs(){
                let me = this;
                axios
                    .put('/recursos/'+ me.recurso.id, me.recurso)
                    .then(function(response){
                        me.selectRecursos();
                        $('#modalRecurs').modal('hide');
                    }).catch(function(error){
                        me.errorMessage = error.response.data.error;
                    })
            },
            confirmarDelete(recurso){
                this.recurso = recurso;
                $('#modalBorrar').modal('show')
            },
            borrarRecurs(){
                let me = this;
                axios
                    .delete('/recursos/'+ me.recurso.id)
                    .then(function(response){
                        me.infoMessage = response.data.missatge;
                        me.selectRecursos();
                        $('#modalBorrar').modal('hide'); // CERRAR MODAL
                    }).catch(function(error){
                        me.errorMessage = error.response.data.error;
                        $('modalBorrar').modal('hide');
                    })
            },
        },
        created(){
            this.selectRecursos();
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
