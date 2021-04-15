<template>
    <div class="container mr-4 col-12">
        <div class="form-group row ml-5">
            <div class="card col-md-5 ml-2 mt-2 col-sm-12" id="card">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title">Alertant</h3>
                </div>
                <div class="card-body">

                    <div class="form-group row">

                        <div class="col-sm-12 col-12">
                            <label for="tipus_alertant" class="col-form-label"><strong>Tipus alertant</strong></label>
                            <div class="form-check form-check-inline" v-for="alertant in tipusAlertants" :key="alertant.id">
                                <input class="form-check-input" type="radio" name="tipus_alertant" :id="alertant.id" :value="alertant.id" v-model="tipusaSelec">
                                <label class="form-check-label" :for="alertant.id">{{ alertant.tipus }}</label>
                            </div>
                        </div>
                    </div>

                    <div v-if="tipusaSelec == 1">
                        <div class="form-group row">

                            <div class="col-sm-7 col-7">
                                <label for="nom_alertant" class="col-form-label"><strong>Nom del centre Sanitari</strong></label>
                                <select v-model="centreSelec" class="form-control" name="nom_alertant" id="nom_alertant">

                                    <option  v-for="alertant in alertants" :key="alertant.id" :value="alertant.id"><div v-if="alertant.tipus_alertant_id == tipus" >{{ alertant.nom }}</div></option>

                                </select>
                            </div>

                            <div class="col-sm-5 col-5">
                                <label for="nom_afectat1" class="col-form-label"><strong>Nom del metge</strong></label>
                                <input class="form-control" type="text" name="nom_afectat1" id="nom_afectat1">
                            </div>

                        </div>

                        <div class="form-group row">


                            <div class="col-sm-6 col-6">
                                <label for="telefon_alertant" class="col-form-label"><strong>Telèfon del centre</strong></label>
                                <div v-for="alertant in alertants" :key="alertant.id">
                                    <input v-if="alertant.id == centreSelec" class="form-control" type="tel" name="telefon_alertant" id="telefon_alertant"
                                    :value="alertant.telefon" maxlength="9" min="0">

                                </div>

                            </div>

                            <div class="col-sm-6 col-6" >
                                <label for="municipi" class="col-form-label"><strong>Municipi</strong></label>
                                <div v-for="alertant in alertants" :key="alertant.id">
                                    <div v-for="municipi in municipis" :key="municipi.id" >
                                        <input v-if="alertant.id == centreSelec && alertant.municipis_id == municipi.id" class="form-control" type="text" name="municipi" id="municipi" :value="municipi.nom">
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6 col-6" >
                                <label for="direccio" class="col-form-label"><strong>Adreça</strong></label>
                                <div v-for="alertant in alertants" :key="alertant.id">
                                    <input v-if="alertant.id == centreSelec" type="text" class="form-control" name="direccio" id="direccio" :value="alertant.adreca">
                                </div>
                            </div>
                        </div>

                    </div>

                    <div v-if="tipusaSelec == 2">

                        <div class="form-group row">

                            <div class="col-sm-5 col-5">
                                <label for="nom_afectat1" class="col-form-label"><strong>Nom</strong></label>
                                <input class="form-control" type="text" name="nom_afectat1" id="nom_afectat1" v-model="nomAfectat">
                            </div>

                            <div class="col-sm-5 col-5">
                                <label for="cognom_afectat1" class="col-form-label"><strong>Cognom</strong></label>
                                <input class="form-control" type="text" name="cognom_afectat1" id="cognom_afectat1" v-model="cognomAfectat">

                            </div>

                        </div>

                        <div class="form-group row">

                            <div class="col-sm-5 col-5">
                                <label for="telefon_alertant" class="col-form-label"><strong>Telèfon</strong></label>
                                <input class="form-control" type="tel" name="telefon_alertant" id="telefon_alertant" maxlength="9" min="0" v-model="telefonAfectat">
                            </div>

                            <div class="col-sm-5 col-5">
                                <label for="provincia" class="col-form-label"><strong>Província</strong></label><br>
                                <div>
                                    <div class="form-check form-check-inline" v-for="provincia in provincies" :key="provincia.id" >
                                        <input class="form-check-input" type="radio" name="provincia" :id="provincia.nom" :value="provincia.id" v-model="provinciaSelec">
                                        <label class="form-check-label" :for="provincia.nom">{{ provincia.nom }}</label>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="form-group row">

                            <div class="col-sm-5 col-5">
                                <label for="comarca" class="col-form-label"><strong>Comarca</strong></label>
                                <select v-model="ComarcaSelec" class="form-control" name="comarca" id="comarca">
                                    <option  v-for="comarca in comarques" :key="comarca.id" :value="comarca.id"><div v-if="comarca.provincies_id == provinciaSelec" >{{ comarca.nom }}</div></option>
                                </select>
                            </div>

                            <div class="col-sm-5 col-5">
                                <label for="municipi" class="col-form-label"><strong>Municipi</strong></label>
                                <select v-model="ProvinciaSelec" class="form-control" name="municipi" id="municipi">

                                    <option v-for="municipi in municipis" :key="municipi.id" :value="municipi.id"><div v-if="municipi.comarques_id == ComarcaSelec">{{ municipi.nom }}</div></option>

                                </select>
                            </div>


                        </div>

                        <div class="form-group row">

                            <div class="col-sm9 col-9">
                                <label for="direccio" class="col-form-label"><strong>Adreça</strong></label>
                                <input type="text" class="form-control" name="direccio" id="direccio">
                                <label for="comp_direccio" class="col-form-label"><strong>Adreça complementària</strong></label>
                                <input type="text" class="form-control" name="comp_direccio" id="comp_direccio">
                            </div>
                        </div>

                    </div>




                    <!-- <div class="form-group row">

                        <div class="col-sm-5 col-5">
                            <label for="provincia" class="col-form-label"><strong>Província</strong></label><br>
                            <div>
                                <div class="form-check form-check-inline" v-for="provincia in provincies" :key="provincia.id" >
                                    <input class="form-check-input" type="radio" name="provincia" :id="provincia.nom" :value="provincia.id" v-model="provinciaSelec">
                                    <label class="form-check-label" :for="provincia.nom">{{ provincia.nom }}</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-5 col-5">
                            <label for="comarca" class="col-form-label"><strong>Comarca</strong></label>
                            <select v-model="ComarcaSelec" class="form-control" name="comarca" id="comarca">
                                <option  v-for="comarca in comarques" :key="comarca.id" :value="comarca.id"><div v-if="comarca.provincies_id == provinciaSelec" >{{ comarca.nom }}</div></option>
                            </select>
                        </div>

                    </div>



                    <div class="form-group row">



                        <div class="col-sm-5 col-5">
                            <label for="municipi" class="col-form-label"><strong>Municipi</strong></label>
                            <select v-model="ProvinciaSelec" class="form-control" name="municipi" id="municipi">

                                <option v-for="municipi in municipis" :key="municipi.id" :value="municipi.id"><div v-if="municipi.comarques_id == ComarcaSelec">{{ municipi.nom }}</div></option>

                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-7 col-7">
                            <label for="direccio" class="col-form-label"><strong>Adreça</strong></label>
                            <input type="text" class="form-control" name="direccio" id="direccio">
                            <label for="comp_direccio" class="col-form-label"><strong>Adreça complementària</strong></label>
                            <input type="text" class="form-control" name="comp_direccio" id="comp_direccio">
                        </div>

                    </div> -->

                </div>
            </div>

            <div class="card col-md-5 ml-2 mt-2 col-sm-12" id="card">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title">Afectat</h3>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <a class="btn btn-primary m-2" v-on:click="colorboto()" :style="{ 'background-color': color}" data-toggle="collapse" href="#afectat1" role="button" aria-expanded="false" aria-controls="afectat1">Afectat 1</a>
                        <a class="btn btn-primary m-2" v-on:click="colorboto2()" :style="{ 'background-color': color2}" data-toggle="collapse" href="#afectat2" role="button" aria-expanded="false" aria-controls="afectat2">Afectat 2</a>
                        <a class="btn btn-primary m-2" v-on:click="colorboto3()" :style="{ 'background-color': color3}" data-toggle="collapse" href="#afectat3" role="button" aria-expanded="false" aria-controls="afectat3">Afectat 3</a>
                        <a class="btn btn-primary m-2"  v-on:click="colorboto4()" :style="{ 'background-color': color4}" data-toggle="collapse" href="#afectat4" role="button" aria-expanded="false" aria-controls="afectat4">Afectat 4</a>
                        <a class="btn btn-primary m-2"  v-on:click="colorboto5()" :style="{ 'background-color': color5}" data-toggle="collapse" href="#afectat5" role="button" aria-expanded="false" aria-controls="afectat5">Afectat 5</a>
                    </div>

                    <div class="collapse multi-collapse mt-2 mb-2 show" id="afectat1">

                        <div class="card card-body" style="border: 2px solid #2c3e50">
                            <h4 class="card-title">Afectat 1</h4>
                            <div v-if="tipusaSelec == 2">
                                <div class="form-group row">

                                    <div class="col-sm-5 col-5">
                                        <label for="nom_afectat1" class="col-form-label"><strong>Nom</strong></label>
                                        <input class="form-control" type="text" name="nom_afectat1" id="nom_afectat1" :value="nomAfectat" disabled>
                                    </div>

                                    <div class="col-sm-5 col-5">
                                        <label for="cognom_afectat1" class="col-form-label"><strong>Cognom</strong></label>
                                        <input class="form-control" type="text" name="cognom_afectat1" id="cognom_afectat1" :value="cognomAfectat" disabled>

                                    </div>

                                </div>

                                <div class="form-group row">

                                    <div class="col-sm-5 col-5">
                                        <label for="document_afectat1" class="col-form-label"><strong>DNI, TS/NSS</strong></label>
                                        <input class="form-control" type="text" name="document_afectat1" id="document_afectat1" maxlength="14" min="0" >

                                    </div>

                                    <div class="col-sm-5 col-5">
                                        <label for="telefon_alertant1" class="col-form-label"><strong>Telèfon</strong></label>
                                        <input class="form-control" type="tel" name="telefon_alertant1" id="telefon_alertant1" maxlength="9" min="0" :value="telefonAfectat" disabled>

                                    </div>

                                </div>
                            </div>
                            <div v-else>
                                <div class="form-group row">

                                    <div class="col-sm-5 col-5">
                                        <label for="nom_afectat1" class="col-form-label"><strong>Nom</strong></label>
                                        <input class="form-control" type="text" name="nom_afectat1" id="nom_afectat1">
                                    </div>

                                    <div class="col-sm-5 col-5">
                                        <label for="cognom_afectat1" class="col-form-label"><strong>Cognom</strong></label>
                                        <input class="form-control" type="text" name="cognom_afectat1" id="cognom_afectat1" >
                                    </div>

                                </div>

                                <div class="form-group row">

                                    <div class="col-sm-5 col-5">
                                        <label for="document_afectat1" class="col-form-label"><strong>DNI, TS/NSS</strong></label>
                                        <input class="form-control" type="text" name="document_afectat1" id="document_afectat1" maxlength="14" min="0" >

                                    </div>

                                    <div class="col-sm-5 col-5">
                                        <label for="telefon_alertant1" class="col-form-label"><strong>Telèfon</strong></label>
                                        <input class="form-control" type="tel" name="telefon_alertant1" id="telefon_alertant1" maxlength="9" min="0">

                                    </div>

                                </div>

                            </div>



                            <div class="form-group row">

                                <div class="col-sm-5 col-5">
                                    <label for="edat_afectat1" class="col-form-label"><strong>Edat</strong></label>
                                    <input class="form-control" type="number" name="edat_afectat1" id="edat_afectat1" min="0" maxlength="3">
                                </div>

                                <div class="col-sm-5 col-5">
                                    <label for="genere1" class="col-form-label"><strong>Génere</strong></label><br>
                                    <div class="form-check form-check-inline" v-for="sexe in sexes" :key="sexe.id" >
                                        <input class="form-check-input" type="radio" name="genere1" :id="sexe.id" :value="sexe.sexe">
                                        <label class="form-check-label" :for="sexe.id">{{ sexe.sexe }}</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">

                                <div class="col-sm-5 col-5">
                                    <label for="tipus_accident1" class="col-form-label"><strong>Tipus d'accident o d'incident</strong></label>
                                    <select class="form-control" name="tipus_accident1" id="tipus_accident1">
                                        <option selected disabled>Seleccionar...</option>
                                        <option v-for="accident in accidents" :key="accident.id" :value="accident.id">{{ accident.tipus }}</option>
                                    </select>

                                    <label for="num_afectats1" class="col-form-label mt-2"><strong>Numero de afectats</strong></label>
                                    <input type="number" class="form-control" name="num_afectats1" id="num_afectats1" min="0">
                                </div>


                                <div class="col-sm-5 col-5">
                                    <label for="descripcio1" class="col-form-label"><strong>Descripció d'accident o d'incident</strong></label>
                                    <textarea class="form-control" id="descripcio1" name= "descripcio1" rows="4" placeholder="Descripció sobre l'accident o l'incident..."></textarea>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="collapse multi-collapse mt-2 mb-2" id="afectat2">

                        <div class="card card-body" style="border: 2px solid #2c3e50">
                            <h4 class="card-title">Afectat 2</h4>
                            <div class="form-group row">

                                <div class="col-sm-5 col-5">
                                    <label for="nom_afectat2" class="col-form-label"><strong>Nom</strong></label>
                                    <input class="form-control" type="text" name="nom_afectat2" id="nom_afectat2">
                                </div>

                                <div class="col-sm-5 col-5">
                                    <label for="cognom_afectat2" class="col-form-label"><strong>Cognom</strong></label>
                                    <input class="form-control" type="text" name="cognom_afectat2" id="cognom_afectat2">

                                </div>

                            </div>

                            <div class="form-group row">

                                <div class="col-sm-5 col-5">
                                    <label for="document_afectat2" class="col-form-label"><strong>DNI, TS/NSS</strong></label>
                                    <input class="form-control" type="text" name="document_afectat2" id="document_afectat2" maxlength="14" min="0" >

                                </div>

                                <div class="col-sm-5 col-5">
                                    <label for="telefon_alertant2" class="col-form-label"><strong>Telèfon</strong></label>
                                    <input class="form-control" type="tel" name="telefon_alertant2" id="telefon_alertant2" maxlength="9" min="0">

                                </div>

                            </div>

                            <div class="form-group row">

                                <div class="col-sm-5 col-5">
                                    <label for="edat_afectat2" class="col-form-label"><strong>Edat</strong></label>
                                    <input class="form-control" type="number" name="edat_afectat2" id="edat_afectat2" min="0" maxlength="3">
                                </div>

                                <div class="col-sm-5 col-5">
                                    <label for="genere2" class="col-form-label"><strong>Génere</strong></label><br>
                                    <div class="form-check form-check-inline" v-for="sexe in sexes" :key="sexe.id" >
                                        <input class="form-check-input" type="radio" name="genere2" :id="sexe.id" v-model="checked" :value="sexe.sexe">
                                        <label class="form-check-label" :for="sexe.id">{{ sexe.sexe }}</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">

                                <div class="col-sm-5 col-5">
                                    <label for="tipus_accident2" class="col-form-label"><strong>Tipus d'accident o d'incident</strong></label>
                                    <select class="form-control" name="tipus_accident2" id="tipus_accident2">
                                        <option selected disabled>Seleccionar...</option>
                                        <option v-for="accident in accidents" :key="accident.id" :value="accident.id">{{ accident.tipus }}</option>
                                    </select>

                                    <label for="num_afectats2" class="col-form-label mt-2"><strong>Numero de afectats</strong></label>
                                    <input type="number" class="form-control" name="num_afectats2" id="num_afectats2" min="0">
                                </div>


                                <div class="col-sm-5 col-5">
                                    <label for="descripcio2" class="col-form-label"><strong>Descripció d'accident o d'incident</strong></label>
                                    <textarea class="form-control" id="descripcio2" name= "descripcio2" rows="4" placeholder="Descripció sobre l'accident o l'incident..."></textarea>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="collapse multi-collapse mt-2 mb-2" id="afectat3">

                        <div class="card card-body" style="border: 2px solid #2c3e50">
                            <h4 class="card-title">Afectat 3</h4>
                            <div class="form-group row">

                                <div class="col-sm-5 col-5">
                                    <label for="nom_afectat1" class="col-form-label"><strong>Nom</strong></label>
                                    <input class="form-control" type="text" name="nom_afectat1" id="nom_afectat3">
                                </div>

                                <div class="col-sm-5 col-5">
                                    <label for="cognom_afectat3" class="col-form-label"><strong>Cognom</strong></label>
                                    <input class="form-control" type="text" name="cognom_afectat3" id="cognom_afectat3">

                                </div>

                            </div>

                            <div class="form-group row">

                                <div class="col-sm-5 col-5">
                                    <label for="document_afectat3" class="col-form-label"><strong>DNI, TS/NSS</strong></label>
                                    <input class="form-control" type="text" name="document_afectat3" id="document_afectat3" maxlength="14" min="0" >

                                </div>

                                <div class="col-sm-5 col-5">
                                    <label for="telefon_alertant3" class="col-form-label"><strong>Telèfon</strong></label>
                                    <input class="form-control" type="tel" name="telefon_alertant3" id="telefon_alertant3" maxlength="9" min="0">

                                </div>

                            </div>

                            <div class="form-group row">

                                <div class="col-sm-5 col-5">
                                    <label for="edat_afectat3" class="col-form-label"><strong>Edat</strong></label>
                                    <input class="form-control" type="number" name="edat_afectat3" id="edat_afectat3" min="0" maxlength="3">
                                </div>

                                <div class="col-sm-5 col-5">
                                    <label for="genere3" class="col-form-label"><strong>Génere</strong></label><br>
                                    <div class="form-check form-check-inline" v-for="sexe in sexes" :key="sexe.id" >
                                        <input class="form-check-input" type="radio" name="genere3" :id="sexe.id" v-model="checked" :value="sexe.sexe">
                                        <label class="form-check-label" :for="sexe.id">{{ sexe.sexe }}</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">

                                <div class="col-sm-5 col-5">
                                    <label for="tipus_accident3" class="col-form-label"><strong>Tipus d'accident o d'incident</strong></label>
                                    <select class="form-control" name="tipus_accident3" id="tipus_accident3">
                                        <option selected disabled>Seleccionar...</option>
                                        <option v-for="accident in accidents" :key="accident.id" :value="accident.id">{{ accident.tipus }}</option>
                                    </select>

                                    <label for="num_afectats3" class="col-form-label mt-2"><strong>Numero de afectats</strong></label>
                                    <input type="number" class="form-control" name="num_afectats3" id="num_afectats3" min="0">
                                </div>


                                <div class="col-sm-5 col-5">
                                    <label for="descripcio3" class="col-form-label"><strong>Descripció d'accident o d'incident</strong></label>
                                    <textarea class="form-control" id="descripcio3" name= "descripcio3" rows="4" placeholder="Descripció sobre l'accident o l'incident..."></textarea>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="collapse multi-collapse mt-2 mb-2" id="afectat4">

                        <div class="card card-body" style="border: 2px solid #2c3e50">
                            <h4 class="card-title">Afectat 4</h4>
                            <div class="form-group row">

                                <div class="col-sm-5 col-5">
                                    <label for="nom_afectat4" class="col-form-label"><strong>Nom</strong></label>
                                    <input class="form-control" type="text" name="nom_afectat4" id="nom_afectat4">
                                </div>

                                <div class="col-sm-5 col-5">
                                    <label for="cognom_afectat4" class="col-form-label"><strong>Cognom</strong></label>
                                    <input class="form-control" type="text" name="cognom_afectat4" id="cognom_afectat4">

                                </div>

                            </div>

                            <div class="form-group row">

                                <div class="col-sm-5 col-5">
                                    <label for="document_afectat4" class="col-form-label"><strong>DNI, TS/NSS</strong></label>
                                    <input class="form-control" type="text" name="document_afectat4" id="document_afectat4" maxlength="14" min="0" >

                                </div>

                                <div class="col-sm-5 col-5">
                                    <label for="telefon_alertant4" class="col-form-label"><strong>Telèfon</strong></label>
                                    <input class="form-control" type="tel" name="telefon_alertant4" id="telefon_alertant4" maxlength="9" min="0">

                                </div>

                            </div>

                            <div class="form-group row">

                                <div class="col-sm-5 col-5">
                                    <label for="edat_afectat4" class="col-form-label"><strong>Edat</strong></label>
                                    <input class="form-control" type="number" name="edat_afectat4" id="edat_afectat4" min="0" maxlength="3">
                                </div>

                                <div class="col-sm-5 col-5">
                                    <label for="genere4" class="col-form-label"><strong>Génere</strong></label><br>
                                    <div class="form-check form-check-inline" v-for="sexe in sexes" :key="sexe.id" >
                                        <input class="form-check-input" type="radio" name="genere4" :id="sexe.id" v-model="checked" :value="sexe.sexe">
                                        <label class="form-check-label" :for="sexe.id">{{ sexe.sexe }}</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">

                                <div class="col-sm-5 col-5">
                                    <label for="tipus_accident4" class="col-form-label"><strong>Tipus d'accident o d'incident</strong></label>
                                    <select class="form-control" name="tipus_accident4" id="tipus_accident4">
                                        <option selected disabled>Seleccionar...</option>
                                        <option v-for="accident in accidents" :key="accident.id" :value="accident.id">{{ accident.tipus }}</option>
                                    </select>

                                    <label for="num_afectats4" class="col-form-label mt-2"><strong>Numero de afectats</strong></label>
                                    <input type="number" class="form-control" name="num_afectats4" id="num_afectats4" min="0">
                                </div>


                                <div class="col-sm-5 col-5">
                                    <label for="descripcio4" class="col-form-label"><strong>Descripció d'accident o d'incident</strong></label>
                                    <textarea class="form-control" id="descripcio4" name= "descripcio4" rows="4" placeholder="Descripció sobre l'accident o l'incident..."></textarea>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="collapse multi-collapse mt-2 mb-2" id="afectat5">

                        <div class="card card-body" style="border: 2px solid #2c3e50">
                            <h4 class="card-title">Afectat 5</h4>
                            <div class="form-group row">

                                <div class="col-sm-5 col-5">
                                    <label for="nom_afectat5" class="col-form-label"><strong>Nom</strong></label>
                                    <input class="form-control" type="text" name="nom_afectat5" id="nom_afectat5">
                                </div>

                                <div class="col-sm-5 col-5">
                                    <label for="cognom_afectat5" class="col-form-label"><strong>Cognom</strong></label>
                                    <input class="form-control" type="text" name="cognom_afectat5" id="cognom_afectat5">

                                </div>

                            </div>

                            <div class="form-group row">

                                <div class="col-sm-5 col-5">
                                    <label for="document_afectat5" class="col-form-label"><strong>DNI, TS/NSS</strong></label>
                                    <input class="form-control" type="text" name="document_afectat5" id="document_afectat5" maxlength="14" min="0" >

                                </div>

                                <div class="col-sm-5 col-5">
                                    <label for="telefon_alertant5" class="col-form-label"><strong>Telèfon</strong></label>
                                    <input class="form-control" type="tel" name="telefon_alertant5" id="telefon_alertant5" maxlength="9" min="0">

                                </div>

                            </div>

                            <div class="form-group row">

                                <div class="col-sm-5 col-5">
                                    <label for="edat_afectat5" class="col-form-label"><strong>Edat</strong></label>
                                    <input class="form-control" type="number" name="edat_afectat5" id="edat_afectat5" min="0" maxlength="3">
                                </div>

                                <div class="col-sm-5 col-5">
                                    <label for="genere5" class="col-form-label"><strong>Génere</strong></label><br>
                                    <div class="form-check form-check-inline" v-for="sexe in sexes" :key="sexe.id" >
                                        <input class="form-check-input" type="radio" name="genere5" :id="sexe.id" v-model="checked" :value="sexe.sexe">
                                        <label class="form-check-label" :for="sexe.id">{{ sexe.sexe }}</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">

                                <div class="col-sm-5 col-5">
                                    <label for="tipus_accident5" class="col-form-label"><strong>Tipus d'accident o d'incident</strong></label>
                                    <select class="form-control" name="tipus_accident5" id="tipus_accident5">
                                        <option selected disabled>Seleccionar...</option>
                                        <option v-for="accident in accidents" :key="accident.id" :value="accident.id">{{ accident.tipus }}</option>
                                    </select>

                                    <label for="num_afectats5" class="col-form-label mt-2"><strong>Numero de afectats</strong></label>
                                    <input type="number" class="form-control" name="num_afectats5" id="num_afectats5" min="0">
                                </div>


                                <div class="col-sm-5 col-5">
                                    <label for="descripcio5" class="col-form-label"><strong>Descripció d'accident o d'incident</strong></label>
                                    <textarea class="form-control" id="descripcio5" name= "descripcio5" rows="4" placeholder="Descripció sobre l'accident o l'incident..."></textarea>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="form-group row ml-5">
            <a class="btn btn-primary m-2 btn-lg" data-toggle="collapse" href="#recurs_mobil" role="button" aria-expanded="false" aria-controls="recurs_mobil">Resposta amb recurs mòbil</a>
            <a class="btn btn-primary m-2 btn-lg" data-toggle="collapse" href="#no_recurs" role="button" aria-expanded="false" aria-controls="no_recurs">Resposta sense recurs mòbil</a>
        </div>


        <div class="row mt-2 mb-1">
            <div class="col">
                <div class="collapse multi-collapse" id="recurs_mobil">
                    <div class="card card-body">
                        <div class="form-group row">
                            <div class="col-sm-4 col-4">
                                <h5><u>Primer recurs mòbil</u></h5>
                                <label for="recurs1" class="col-form-label"><strong>Tipus de recurs</strong></label>
                                <select class="form-control" name="recurs1" id="recurs1" v-model="recursSelec1">
                                    <option selected disabled>Seleccionar...</option>
                                    <option v-for="recurs in recursos" :key="recurs.id" :value="recurs.id">{{ recurs.tipus }}</option>
                                    <option value="altre">Altre</option>
                                </select>
                            </div>

                            <div class="col-sm-4 col-4">
                                <h5><u>Segon recurs mòbil</u></h5>
                                <label for="recurs2" class="col-form-label"><strong>Tipus de recurs</strong></label>
                                <select class="form-control" name="recurs2" id="recurs2" v-model="recursSelec2">
                                    <option selected disabled>Seleccionar...</option>
                                    <option v-for="recurs in recursos" :key="recurs.id" :value="recurs.id">{{ recurs.tipus }}</option>
                                    <option value="altre2">Altre</option>
                                </select>
                            </div>

                            <div class="col-sm-4 col-4">
                                <h5><u>Tercer recurs mòbil</u></h5>
                                <label for="recurs3" class="col-form-label"><strong>Tipus de recurs</strong></label>
                                <select class="form-control" name="recurs3" id="recurs3" v-model="recursSelec3">
                                    <option selected disabled>Seleccionar...</option>
                                    <option v-for="recurs in recursos" :key="recurs.id" :value="recurs.id">{{ recurs.tipus }}</option>
                                    <option value="altre3">Altre</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col-sm-4 col-4">
                                <label for="prioritat1"><strong>Prioritat</strong></label>
                                <input type="range" class="form-control-range" id="prioritat1" name="prioritat1" value="0" min="0" max="4" oninput="this.nextElementSibling.value = this.value">
                                <output>0</output>
                            </div>

                            <div class="col-sm-4 col-4">
                                <label for="prioritat2"><strong>Prioritat</strong></label>
                                <input type="range" class="form-control-range" id="prioritat2" name="prioritat2" value="0" min="0" max="4" oninput="this.nextElementSibling.value = this.value">
                                <output>0</output>
                            </div>

                            <div class="col-sm-4 col-4">
                                <label for="prioritat3"><strong>Prioritat</strong></label>
                                <input type="range" class="form-control-range" id="prioritat3" name="prioritat3" value="0" min="0" max="4" oninput="this.nextElementSibling.value = this.value">
                                <output>0</output>
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col-sm-4 col-4" v-if="recursSelec1 == 'altre'">
                                <label for="altrer1"><strong>Recurs mòbil 1</strong></label>
                                <input type="text" class="form-control" id="altrer1" name="altrer1" placeholder="Altre vehicle...">
                            </div>

                            <div class="col-sm-4 col-4" v-if="recursSelec2 == 'altre2'">
                                <label for="altrer2"><strong>Recurs mòbil 2</strong></label>
                                <input type="text" class="form-control" id="altrer2" name="altrer2" placeholder="Altre vehicle...">
                            </div>

                            <div class="col-sm-4 col-4" v-if="recursSelec3 == 'altre3'">
                                <label for="altrer3"><strong>Recurs mòbil 3</strong></label>
                                <input type="text" class="form-control" id="altrer3" name="altrer3" placeholder="Altre vehicle...">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="row mt-2 mb-1">
            <div class="col">
                <div class="collapse multi-collapse" id="no_recurs">
                    <div class="card card-body">

                        <div class="form-group row">


                            <label for="resp_no_recurs" class="col-form-label col-2 col-sm-2"><strong>Tipus de resposta</strong></label>
                            <select class="form-control col-5 col-sm-5" name="resp_no_recurs" id="resp_no_recurs">
                                <option value="seleccionar" selected disabled>Seleccionar...</option>
                                <option value="consulta_telefonica" name="consulta_telefonica">Consulta telefònica</option>
                                <option value="informacio_telefonica" name="informacio_telefonica">Informació telefònica</option>
                                <option value="usvap" name="derivacio_centre">Derivació a centres sanitaris</option>
                                <option value="Derivació_a_altres_centres_sanitaris" name="derivacio_altre_sanitari">Derivació a altres centres sanitaris</option>
                                <option value="altre" name="altre_sense">Altre</option>
                            </select>

                        </div>

                    </div>
                </div>
            </div>
            <button type="submit" href="" class="btn btn-success btn-lg boto_enviar" style="background-color: #f70c74"><i class="fas fa-check fa-1x"></i>Enviar</button>
        </div>
    </div>


</template>

<script>
    export default {
        data(){
            return{
                comarques: [],
                provincies: [],
                municipis: [],
                sexes : [],
                accidents : [],
                tipusAlertants : [],
                recursos : [],
                alertants : [],
                recursSelec1 : '',
                recursSelec2 : '',
                recursSelec3 : '',
                provinciaSelec: '',
                comarcaSelec: '',
                tipusaSelec : '',
                centreSelec: '',
                nomAfectat: '',
                cognomAfectat: '',
                telefonAfectat: '',
                color : '#f70c74',
                color2 : '#2c3e50',
                color3 : '#2c3e50',
                color4 : '#2c3e50',
                color5 : '#2c3e50'
            }
        },
        methods: {
            selectAll(){
                let me = this;
                axios
                    .get('/provincies')
                    .then( response => {
                        me.provincies = response.data;
                    })
                    .catch( error => {
                        console.log(error)
                        this.errored = true;
                    })
                    .finally(() => this.loading = false)

                let me2 = this;
                axios
                    .get('/municipis')
                    .then( response => {
                        me2.municipis = response.data;
                    })
                    .catch( error => {
                        console.log(error)
                        this.errored = true;
                    })
                    .finally(() => this.loading = false)

                let me3 = this;
                axios
                    .get('/comarques')
                    .then( response => {
                        me3.comarques = response.data;
                    })
                    .catch( error => {
                        console.log(error)
                        this.errored = true;
                    })
                    .finally(() => this.loading = false)

                let me4 = this;
                axios
                    .get('/sexes')
                    .then( response => {
                        me4.sexes = response.data;
                    })
                    .catch ( error => {
                        console.log(error)
                        this.errored = true;
                    })
                    .finally(() => this.loading = false)

                let me5 = this;
                axios
                    .get('/tipusIncidencies')
                    .then( response => {
                        me5.accidents = response.data;
                    })
                    .catch ( error => {
                        console.log(error)
                        this.errored = true;
                    })
                    .finally(() => this.loading = false)

                let me6 = this;
                axios
                    .get('/tipusAlertants')
                    .then( response => {
                        me6.tipusAlertants = response.data;
                    })
                    .catch ( error => {
                        console.log(error)
                        this.errored = response.data;
                    })
                    .finally(() => this.loading = false)

                let me7 = this;
                axios
                    .get('/tipusRecursos')
                    .then( response => {
                        me7.recursos = response.data;
                    })
                    .catch ( error => {
                        console.log(error)
                        this.errored = response.data;
                    })
                    .finally(() => this.loading = false)
                let me8 = this;
                axios
                    .get('/alertants')
                    .then( response => {
                        me8.alertants = response.data;
                    })
                    .finally(() => this.loading = false)

            },
            colorboto : function(){
                if(this.color == '#f70c74'){
                    this.color = '#2c3e50';
                }else{
                    this.color = '#f70c74';
                }
            },
            colorboto2 : function(){
                if(this.color2 == '#f70c74'){
                    this.color2 = '#2c3e50';
                }else{
                    this.color2 = '#f70c74';
                }
            },
            colorboto3 : function(){
                if(this.color3 == '#f70c74'){
                    this.color3 = '#2c3e50';
                }else{
                    this.color3= '#f70c74';
                }
            },
            colorboto4 : function(){
                if(this.color4 == '#f70c74'){
                    this.color4 = '#2c3e50';
                }else{
                    this.color4 = '#f70c74';
                }
            },
            colorboto5 : function(){
                if(this.color5 == '#f70c74'){
                    this.color5 = '#2c3e50';
                }else{
                    this.color5 = '#f70c74';
                }
            }


        },
        computed :{

        },
        created() {
            this.selectAll();
            this.municipisFiltered();
            this.comarcaFiltered();

        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
