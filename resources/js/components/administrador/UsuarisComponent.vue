<template>
    <main>
        <div class="card mt-3">
            <div class="card-body mt-1">
                <h5 class="card-title" id="titol_form">Usuaris</h5>
                <form class="form-inline my-2 my-lg-0 col-sm-4" id="buscador_form">
                    <input class="form-control mr-sm-2" type="text" placeholder="Buscar Usuari" aria-label="Buscar Usuari" v-model="buscador" @keyup="buscarUsuaris">
                </form>
                <table class="table mt-2">
                    <thead>
                        <tr>
                            <th scope="col">Nom</th>
                            <th scope="col">Cognoms</th>
                            <th scope="col">Nom d'Usuari</th>
                            <th scope="col">Email</th>
                            <th scope="col">Rol</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="usuari in usuaris" :key="usuari.id">
                            <td>{{ usuari.nom }}</td>
                            <td>{{ usuari.cognoms }}</td>
                            <td>{{ usuari.username }}</td>
                            <td>{{ usuari.email }}</td>
                            <div v-for="rol in rols" :key="rol.id">
                                <td v-if="usuari.rols_id == rol.id">
                                        {{ rol.nom }}
                                </td>
                            </div>
                            <td>
                                <button type="submit" class="btn btn-secondary btn-sm" @click="editUsuari(usuari)"><i class="far fa-edit"></i> Editar</button>
                                <button type="submit" id="botones" class="btn btn-danger btn-sm ml-1" @click="confirmarDelete(usuari)"><i class="far fa-trash-alt"></i> Esborrar</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>

        <a @click="crearUsuari()" id="botoCrear"><i class="far fa-plus-circle fa-3x"></i></a>

        <!-- Modal Borrar-->
        <div class="modal fade" id="modalBorrar" tabindex="-1" role="dialog" aria-labelledby="modalBorrarLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Esborrar Usuari</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Estas segur d'esborrar l'usuari {{ usuari.nom }} ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="fas fa-times"></i> Tancar</button>
                        <button type="button" id="botonBorrar" class="btn btn-danger btn-sm" @click="borrarUsuari()"><i class="far fa-trash-alt"></i> Esborrar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Insert/Update -->
        <div class="modal fade" id="modalUsuari" tabindex="-1" role="dialog" aria-labelledby="modalBorrarLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 v-if="insert" class="modal-title" id="UsuariModalLabel">Introduir Usuari</h5>
                        <h5 v-else class="modal-title" id="UsuariModalLabel">Modificar Usuari</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group row">
                                <label for="nom" class="col-sm-2 col-form-label">Nom</label>
                                <div class="col-sm-4">
                                    <input type="text" name="nom" id="nom" class="form-control" v-model="usuari.nom">
                                </div>

                                <label for="cognoms" class="col-sm-2 col-form-label">Cognoms</label>
                                <div class="col-sm-4">
                                    <input type="text" name="cognoms" id="cognoms" class="form-control" v-model="usuari.cognoms">
                                </div>
                            </div>

                            <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" name="email" id="email" class="form-control" v-model="usuari.email">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="username" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-4">
                                    <input type="text" name="username" id="username" class="form-control" v-model="usuari.username" autofocus>
                                </div>

                                <label for="contrasenya" class="col-sm-2 col-form-label">Contrasenya</label>
                                <div class="col-sm-4">
                                    <input type="text" name="contrasenya" id="contrasenya" class="form-control" v-model="usuari.contrasenya">
                                </div>
                            </div>


                            <div class="form-group row">

                                <label for="recurs" class="col-sm-2 col-form-label">Tipus de Recurs</label>
                                <div class="col-sm-7 mt-2">
                                    <select class="form-control" id="recurs" name="recurs" v-model="usuari.recursos_id">
                                        <option v-for="tipusRecurs in tipusRecursos" :key="tipusRecurs.id" v-bind:value="tipusRecurs.id">{{ tipusRecurs.tipus   }}</option>
                                    </select>
                                </div>

                            </div>

                            <div class="form-group row">
                                <label for="rol" class="col-sm-2 col-form-label">Tipus de Rol</label>
                                <div class="form-check form-check-inline ml-3" v-for="rol in rols" :key="rol.id">
                                    <input class="form-check-input" type="radio" name="rol" :id="rol.id" :value="rol.id" v-model="usuari.rols_id">
                                    <label class="form-check-label" :for="rol.id">
                                        {{ rol.nom }}
                                    </label>
                                </div>
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="fas fa-times"></i> Tancar</button>
                        <button v-if="insert" type="button" id="botonBorrar" class="btn btn-danger btn-sm" @click="insertUsuari()">Afegir</button>
                        <button v-else type="button" id="botonBorrar" class="btn btn-danger btn-sm" @click="updateUsuari()">Modificar</button>
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
                buscador:'',
                setTimeoutBuscador:'',
                usuaris: [],
                rols: [],
                usuari: {
                    id: '',
                    username: '',
                    contrasenya: '',
                    email: '',
                    nom: '',
                    cognoms: '',
                    rols_id: '',
                    recursos_id: ''
                },
                usuariVacio: {
                    id: '',
                    username: '',
                    contrasenya: '',
                    email: '',
                    nom: '',
                    cognoms: '',
                    rols_id: '',
                    recursos_id: ''
                },
                tipusRecursos: [],
                insert: false
            }

        },
        methods: {
            selectUsuaris(){
                let me = this;
                axios
                    .get('/usuaris',{params:{
                        buscador: this.buscador
                    }})
                    .then(response => {
                        me.usuaris = response.data;
                    })
                    .catch(error => {
                        console.log(error)
                        this.errored = true;
                    })
                    .finally(() => this.loading = false)
                let me2 = this;
                axios
                    .get('/rols')
                    .then(response => {
                        me2.rols = response.data;
                    })
                    .catch(error => {
                        console.log(error)
                        this.errored = true;
                    })
            },
            selectTipusRecursos(){
                let me = this;
                axios
                    .get('/tipusRecursos')
                    .then(response => {
                        me.tipusRecursos = response.data;
                    })
                    .catch(error => {
                        console.log(error)
                        this.errored = true;
                    })
                    .finally(() => this.loading = false)
            },
            crearUsuari(){
                this.insert = true;
                this.usuari = this.usuariVacio;
                $('#modalUsuari').modal('show')
            },
            insertUsuari(){
                let me = this;
                axios
                    .post('/usuaris', me.usuari)
                    .then(function(response){
                        me.selectUsuaris();
                        $('#modalUsuari').modal('hide');
                    }).catch(function(error){
                        me.errorMessage = error.response.data.error;
                    })
            },
            editUsuari(usuari){
                this.insert = false;
                this.usuari = usuari;
                $('#modalUsuari').modal('show')
            },
            updateUsuari(){
                let me = this;
                axios
                    .put('/usuaris/'+ me.usuari.id, me.usuari)
                    .then(function(response){
                        me.selectUsuaris();
                        $('#modalUsuari').modal('hide');
                    }).catch(function(error){
                        me.errorMessage = error.response.data.error;
                    })
            },
            confirmarDelete(usuari){
                this.usuari = usuari;
                $('#modalBorrar').modal('show')
            },
            borrarUsuari(){
                let me = this;
                axios
                    .delete('/usuaris/'+ me.usuari.id)
                    .then(function(response){
                        me.infoMessage = response.data.missatge;
                        me.selectUsuaris();
                        $('#modalBorrar').modal('hide'); // CERRAR MODAL
                    }).catch(function(error){
                        me.errorMessage = error.response.data.error;
                        $('modalBorrar').modal('hide');
                    })
            },
             buscarUsuaris(){
                clearTimeout(this.setTimeoutBuscador);
                this.setTimeoutBuscador = setTimeout(this.selectUsuaris, 360);
            }
        },
        created(){
            this.selectUsuaris();
            this.selectTipusRecursos();
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
