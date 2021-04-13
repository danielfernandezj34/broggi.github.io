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
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="tipus_alertant" id="vip" value="vip">
                                <label class="form-check-label" for="vip">Alertant VIP</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="tipus_alertant" id="centre" value="sanitari">
                                <label class="form-check-label" for="centre">Centre sanitari</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="tipus_alertant" id="accidental" value="accidental">
                                <label class="form-check-label" for="accidental">Accidental</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="tipus_alertant" id="entorn_afectat" value="entorn_afectat">
                                <label class="form-check-label" for="entorn_afectat">Entorn afectat</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="tipus_alertant" id="afectat" value="afectat">
                                <label class="form-check-label" for="afectat">Afectat</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">

                        <div class="col-sm-5 col-5">
                            <label for="nom_alertant" class="col-form-label"><strong>Nom</strong></label>
                            <input class="form-control" type="text" name="nom_alertant" id="nom_alertant" autofocus>


                        </div>

                        <div class="col-sm-5 col-5">
                            <label for="cognom_alertant" class="col-form-label"><strong>Cognom</strong></label>
                            <input class="form-control" type="text" name="cognom_alertant" id="cognom_alertant">



                        </div>

                    </div>

                    <div class="form-group row">


                        <div class="col-sm-5 col-5">
                            <label for="telefon_alertant" class="col-form-label"><strong>Telèfon</strong></label>
                            <input class="form-control" type="tel" name="telefon_alertant" id="telefon_alertant" maxlength="9" min="0">
                        </div>

                        <div class="col-sm-5 col-5">
                            <label for="provincia" class="col-form-label"><strong>Província</strong></label><br>
                            <div>
                                <div class="form-check form-check-inline" v-for="provincia in provincies" :key="provincia.id" >
                                    <input class="form-check-input" type="radio" name="provincia" :id="provincia.id" v-model="picked" :value="provincia.nom">
                                    <label class="form-check-label" :for="provincia.id">{{ provincia.nom }}</label>
                                </div>
                                <span>check : {{ picked }}</span>
                            </div>


                        </div>

                    </div>



                    <div class="form-group row">

                        <div class="col-sm-5 col-5">
                            <label for="comarca" class="col-form-label"><strong>Comarca</strong></label>
                            <select v-model="ComarcaSelec" class="form-control" name="comarca" id="comarca">

                                <option v-for="comarca in comarques" :key="comarca.id" :value="comarca.id">{{ comarca.nom }}</option>

                            </select>
                        </div>

                        <div class="col-sm-5 col-5">
                            <label for="municipi" class="col-form-label"><strong>Municipi</strong></label>
                            <select v-model="ProvinciaSelec" class="form-control" name="municipi" id="municipi">

                                <option v-for="municipi in municipis" :key="municipi.id" :value="municipi.id">{{ municipi.nom }}</option>

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

                    </div>

                </div>
            </div>

            <div class="card col-md-5 ml-2 mt-2 col-sm-12" id="card">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title">Afectat</h3>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <a class="btn btn-primary m-2" data-toggle="collapse" href="#afectat1" role="button" aria-expanded="false" aria-controls="afectat1">Afectat 1</a>
                        <a class="btn btn-primary m-2" data-toggle="collapse" href="#afectat2" role="button" aria-expanded="false" aria-controls="afectat2">Afectat 2</a>
                        <a class="btn btn-primary m-2" data-toggle="collapse" href="#afectat3" role="button" aria-expanded="false" aria-controls="afectat3">Afectat 3</a>
                        <a class="btn btn-primary m-2" data-toggle="collapse" href="#afectat4" role="button" aria-expanded="false" aria-controls="afectat4">Afectat 4</a>
                        <a class="btn btn-primary m-2" data-toggle="collapse" href="#afectat5" role="button" aria-expanded="false" aria-controls="afectat5">Afectat 5</a>
                    </div>

                    <div class="collapse multi-collapse mt-2 mb-2" id="afectat1">
                         <h4 class="card-title">Afectat 1</h4>
                        <div class="card card-body">

                            <div class="form-group row">

                                <div class="col-sm-5 col-5">
                                    <label for="nom_afectat1" class="col-form-label"><strong>Nom</strong></label>
                                    <input class="form-control" type="text" name="nom_afectat1" id="nom_afectat1">
                                </div>

                                <div class="col-sm-5 col-5">
                                    <label for="cognom_afectat1" class="col-form-label"><strong>Cognom</strong></label>
                                    <input class="form-control" type="text" name="cognom_afectat1" id="cognom_afectat1">

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

                            <div class="form-group row">

                                <div class="col-sm-5 col-5">
                                    <label for="edat_afectat1" class="col-form-label"><strong>Edat</strong></label>
                                    <input class="form-control" type="number" name="edat_afectat1" id="edat_afectat1" min="0" maxlength="3">
                                </div>

                                <div class="col-sm-5 col-5">
                                    <label for="genere1" class="col-form-label"><strong>Génere</strong></label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="genere1" id="home" value="home">
                                        <label class="form-check-label" for="home">Home</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="genere1" id="dona" value="dona">
                                        <label class="form-check-label" for="dona">Dona</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">

                                <div class="col-sm-5 col-5">
                                    <label for="tipus_accident1" class="col-form-label"><strong>Tipus d'accident o d'incident</strong></label>
                                    <select class="form-control" name="tipus_accident1" id="tipus_accident1">
                                        <option value="">Accidents i traumatismes</option>
                                        <option value="">Malaltia a un lloc públic</option>
                                        <option value="">Malaltia a domicili</option>
                                        <option value="">Consulta mèdica</option>
                                        <option value="">Transports sanitari</option>
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
                        <h4 class="card-title">Afectat 2</h4>
                        <div class="card card-body">

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
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="genere2" id="home" value="home">
                                        <label class="form-check-label" for="home">Home</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="genere2" id="dona" value="dona">
                                        <label class="form-check-label" for="dona">Dona</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">

                                <div class="col-sm-5 col-5">
                                    <label for="tipus_accident2" class="col-form-label"><strong>Tipus d'accident o d'incident</strong></label>
                                    <select class="form-control" name="tipus_accident2" id="tipus_accident2">
                                        <option value="">Accidents i traumatismes</option>
                                        <option value="">Malaltia a un lloc públic</option>
                                        <option value="">Malaltia a domicili</option>
                                        <option value="">Consulta mèdica</option>
                                        <option value="">Transports sanitari</option>
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
                        <h4 class="card-title">Afectat 3</h4>
                        <div class="card card-body">

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
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="genere3" id="home" value="home">
                                        <label class="form-check-label" for="home">Home</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="genere3" id="dona" value="dona">
                                        <label class="form-check-label" for="dona">Dona</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">

                                <div class="col-sm-5 col-5">
                                    <label for="tipus_accident3" class="col-form-label"><strong>Tipus d'accident o d'incident</strong></label>
                                    <select class="form-control" name="tipus_accident3" id="tipus_accident3">
                                        <option value="">Accidents i traumatismes</option>
                                        <option value="">Malaltia a un lloc públic</option>
                                        <option value="">Malaltia a domicili</option>
                                        <option value="">Consulta mèdica</option>
                                        <option value="">Transports sanitari</option>
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
                        <h4 class="card-title">Afectat 4</h4>
                        <div class="card card-body">

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
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="genere4" id="home" value="home">
                                        <label class="form-check-label" for="home">Home</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="genere4" id="dona" value="dona">
                                        <label class="form-check-label" for="dona">Dona</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">

                                <div class="col-sm-5 col-5">
                                    <label for="tipus_accident4" class="col-form-label"><strong>Tipus d'accident o d'incident</strong></label>
                                    <select class="form-control" name="tipus_accident4" id="tipus_accident4">
                                        <option value="">Accidents i traumatismes</option>
                                        <option value="">Malaltia a un lloc públic</option>
                                        <option value="">Malaltia a domicili</option>
                                        <option value="">Consulta mèdica</option>
                                        <option value="">Transports sanitari</option>
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
                        <h4 class="card-title">Afectat 5</h4>
                        <div class="card card-body">

                            <div class="form-group row">

                                <div class="col-sm-5 col-5">
                                    <label for="nom_afectat5" class="col-form-label"><strong>Nom</strong></label>
                                    <input class="form-control" type="text" name="nom_afectat1" id="nom_afectat5">
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
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="genere5" id="home" value="home">
                                        <label class="form-check-label" for="home">Home</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="genere5" id="dona" value="dona">
                                        <label class="form-check-label" for="dona">Dona</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">

                                <div class="col-sm-5 col-5">
                                    <label for="tipus_accident5" class="col-form-label"><strong>Tipus d'accident o d'incident</strong></label>
                                    <select class="form-control" name="tipus_accident5" id="tipus_accident5">
                                        <option value="">Accidents i traumatismes</option>
                                        <option value="">Malaltia a un lloc públic</option>
                                        <option value="">Malaltia a domicili</option>
                                        <option value="">Consulta mèdica</option>
                                        <option value="">Transports sanitari</option>
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
                                <select class="form-control" name="recurs1" id="recurs1">
                                    <option value="seleccionar" selected disabled>Seleccionar...</option>
                                    <option value="usvb" name="usvb1">USVB</option>
                                    <option value="usva" name="usva1">USVA</option>
                                    <option value="usvap" name="usvap1">USVAP</option>
                                    <option value="helicopter_medicalitzat" name="helicopter_medicalitzat1">Helicòpter medicalitzat</option>
                                    <option value="transport_secundari" name="transport_secundari1">Transport secundari (col·lectiu i/o programat)</option>
                                    <option value="altre" name="altre1">Altre</option>
                                </select>
                            </div>

                            <div class="col-sm-4 col-4">
                                <h5><u>Segon recurs mòbil</u></h5>
                                <label for="recurs2" class="col-form-label"><strong>Tipus de recurs</strong></label>
                                <select class="form-control" name="recurs2" id="recurs2">
                                    <option value="seleccionar" selected disabled>Seleccionar...</option>
                                    <option value="usvb" name="usvb2">USVB</option>
                                    <option value="usva" name="usv2a">USVA</option>
                                    <option value="usvap" name="usvap2">USVAP</option>
                                    <option value="helicopter_medicalitzat" name="helicopter_medicalitzat2">Helicòpter medicalitzat</option>
                                    <option value="transport_secundari" name="transport_secundari2">Transport secundari (col·lectiu i/o programat)</option>
                                    <option value="altre" name="altre2">Altre</option>
                                </select>
                            </div>

                            <div class="col-sm-4 col-4">
                                <h5><u>Tercer recurs mòbil</u></h5>
                                <label for="recurs3" class="col-form-label"><strong>Tipus de recurs</strong></label>
                                <select class="form-control" name="recurs3" id="recurs3">
                                    <option value="seleccionar" selected disabled>Seleccionar...</option>
                                    <option value="usvb" name="usvb3">USVB</option>
                                    <option value="usva" name="usva3">USVA</option>
                                    <option value="usvap" name="usvap3">USVAP</option>
                                    <option value="helicopter_medicalitzat" name="helicopter_medicalitzat3">Helicòpter medicalitzat</option>
                                    <option value="transport_secundari" name="transport_secundari3">Transport secundari (col·lectiu i/o programat)</option>
                                    <option value="altre" name="altre3">Altre</option>
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
            <button type="submit" href="" class="btn btn-success btn-lg boto_enviar"><i class="fas fa-check fa-1x"></i>Enviar</button>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                comarques: [],
                provincies: [],
                provincia: {
                    nom: ''
                },
                ProvinciaSelec: {},
                ComarcaSelec: {},
                municipis: []
            }
        },
        methods: {
            selectLocal(){
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
            },
            FiltrarCom(provincia){
                this.provincia = provincia

            },
            comarcaFiltered: function () {
                if (this.provincia.id > 0 && this.municipi.id == null) {
                    let comarquesFiltered = [];
                    let comarques = this.comarques;
                    for (let i = 0; i < comarques.length; ++i) {
                        if (comarques[i].provincies_id == this.provincia.id) {
                            comarquesFiltered.push(comarques[i]);
                        }
                    }
                    return ComarcaFiltered;
                }else{
                    return this.comarques;
                }
            },
            municipisFiltered: function () {
                if (this.comarca.id > 0) {
                    let municipisFiltered = [];
                    let municipis = this.municipis;
                    for (let i = 0; i < municipis.length; ++i) {
                    if (municipis[i].comarques_id == this.comarca.id) {
                        municipisFiltered.push(municipis[i]);
                    }
                    }
                    return municipisFiltered;
                } else {
                    return this.municipis;
                }
            },
            selecCom(){

            }


        },
        created() {
            this.selectLocal();
            this.municipisFiltered();
            this.comarcaFiltered();
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
