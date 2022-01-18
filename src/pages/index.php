<!doctype html>
<html lang="de">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Can I?</title>


    <link rel="stylesheet" href="assets/style.css">
</head>

<body>

    <div class="container">

        <nav class="navbar fixed-top navbar-dark bg-dark text-light">
            <div class="container">
                <h1 class="mt-2">Darf ich? - <span class="result"><small>Formular ausfüllen</small></span></h1>
            </div>

        </nav>

        <br>
        <br>
        <br>
        <br>


        <form>
            <h3>Standort</h3>
            <div class="input-group mb-3">
                <span class="input-group-text">Land</span>
                <select class="form-select" id="inputGroupSelect01">
                    <option selected>Bitte wählen</option>
                    <option value="1">Deutschland</option>
                    <option value="2">Österreich</option>
                    <option value="3">Schweiz</option>
                </select>

            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Bundesland</span>
                <select class="form-select" id="inputGroupSelect01">
                    <option selected>Bitte wählen</option>
                    <option value="1">Hessen</option>
                    <option value="2">Thürigen</option>
                    <option value="3">Berlin</option>
                    <option value="3">Brandenburg</option>
                </select>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text">Regelung</span>
                <select class="form-select" id="inputGroupSelect01">
                    <option selected>Bitte wählen</option>
                    <option value="1">3G</option>
                    <option value="2">2G</option>
                    <option value="3">2G +</option>
                </select>
            </div>


            <hr>

            <h3 class="mb-3">Meine Daten</h3>



            <div class="form-group mb-3">
                <label class="form-label">Bist Du geimpft?</label><br>

                <div class="d-flex flex-row">
                    <div>
                      
                        <input type="radio" class="btn-check" name="impfung-0" id="impfung-0-1" value="0" autocomplete="off">
                        <label class="btn btn-outline-danger mb-2" for="impfung-0-1">Keine</label>
                        <input type="radio" class="btn-check" name="impfung-0" id="impfung-0-2" value="1" autocomplete="off">
                        <label class="btn btn-outline-primary mb-2" for="impfung-0-2">1x</label>
                        <input type="radio" class="btn-check" name="impfung-0" id="impfung-0-3" value="2" autocomplete="off">
                        <label class="btn btn-outline-primary mb-2" for="impfung-0-3">2x</label>
                        <input type="radio" class="btn-check" name="impfung-0" id="impfung-0-4" value="3" autocomplete="off">
                        <label class="btn btn-outline-primary mb-2" for="impfung-0-4">3x</label>


                    </div>
                </div>
            </div>

            <!-- Impfstoff -->



            <?php

            foreach ([1, 2, 3] as $no) {


                echo '
                    <div class="form-group mb-3 impfung-container impfung-container-'.$no.'">
                        <label class="form-label">' . $no . '. Impfung</label><br>
                        <div class="d-flex flex-row">
                            <div>
                                    <input type="radio" class="btn-check" name="impfung-' . $no . '" id="impfung-' . $no . '-2" value="0" autocomplete="off">
                                    <label class="btn btn-outline-primary mb-2" for="impfung-' . $no . '-2">BioNTech/Pfizer<span class="long"> - Comirnaty®</span></label>
                     
                                    <input type="radio" class="btn-check" name="impfung-' . $no . '" id="impfung-' . $no . '-3" value="1" autocomplete="off">
                                    <label class="btn btn-outline-primary mb-2" for="impfung-' . $no . '-3">Moderna<span class="long"> - Spikevax®</span></label>
                     
                                    <input type="radio" class="btn-check" name="impfung-' . $no . '" id="impfung-' . $no . '-4" value="2" autocomplete="off">
                                    <label class="btn btn-outline-primary mb-2" for="impfung-' . $no . '-4">AstraZeneca<span class="long"> - Vaxzevria®</span></label>
                
                                    <input type="radio" class="btn-check" name="impfung-' . $no . '" id="impfung-' . $no . '-5" value="3" autocomplete="off">
                                    <label class="btn btn-outline-primary mb-2" for="impfung-' . $no . '-5">Johnson & Johnson<span class="long"> - Janssen®</span></label>
                  
                                    </div>
                                    </div>
           
                    </div>';
            }




            /*
            <div class="form-group mb-3">
                <label class="form-label">3. Impfung</label>
                <div class="input-group">
                    <div class="input-group-text">
                        <input class="form-check-input mt-0" name="impfung-1" type="checkbox" value="1">
                    </div>
                    <select class="form-select" name="impfstoff-1" id="impfstoff-1">
                        <option selected>Bitte wählen</option>
                        <option value="1">BioNTech/Pfizer - Comirnaty®</option>
                        <option value="2">Moderna - Spikevax®</option>
                        <option value="3">AstraZeneca - Vaxzevria®</option>
                        <option value="4">Johnson & Johnson - Janssen®</option>
                    </select>
                </div>
            </div>

            */

            ?>

            <!-- Impfung -->
            <div class="form-group mb-3 impfung-container impfung-container-1">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="letzte-impfung">
                    <label class="form-check-label" for="letzte-impfung">Letzte Impfung länger als 90 Tage her?</label>
                </div>
            </div>


        </form>

    </div>

        <script src="assets/vendor.min.js"></script>

    <script>
        $('.impfung-container').hide();


        $('input[name=impfung-0]').on('click', function() {

            $('.impfung-container').hide();

            for(var i = 1; i <= $(this).val(); i++) {
                $('.impfung-container-' + i).show();
                
            }
            


        });

    </script>

</body>

</html>