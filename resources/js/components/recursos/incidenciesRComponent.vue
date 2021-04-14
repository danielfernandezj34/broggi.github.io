<template>
        <div class="card mt-3">
            <div class="card-body mt-1">
                <h5 class="card-title" id="titol_incidencies">incidencies</h5>
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
                                <button type="submit" class="btn btn-secondary btn-sm" @click="editIncidencia(incidencia)"><i class="far fa-edit"></i> Veure</button>
                                </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
        </div>
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
        editIncidencia(incidencia){
                this.insert = false;
                this.incidencia = incidencia;
                $('#modalIncidencia').modal('show')
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