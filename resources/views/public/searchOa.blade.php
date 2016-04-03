@extends('template.main')

@section('title', 'Buscar')

@section('content')

    <div class="contentHeader row">
        <h1 class="pull-left">Buscador de Objetos de Aprendizaje</h1>
    </div>

    <div class="row">
        <form id="formulario" action="" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label for="text" class="">Buscar objetos:</label>
                <input type="text" id="text" class="" placeholder="Buscar">
            </div>

            <input type="submit" value="Consultar" name="submit">

        </form>
    </div>
    <div class="row" id="lo">

    </div>

@endsection

@section('javascript')

    <script src="{{ asset('js/LomMetadata.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/UserProfile.js') }}" type="text/javascript"></script>

    <script>
        $(document).ready(function (){

            $('#formulario').submit(function (){

                //Obtiene la palabra de busqueda del formulario
                var searchString = $('#text').val();

                $.ajax({
                    type: "GET",
                    data: "val=" + searchString,
                    url: "http://froac.manizales.unal.edu.co/froacn",
                    dataType: "jsonp",
                    async: true,
                    success: function(datos){
                        var dataJson = eval(datos);

                        var items = [];
                        $.each(dataJson, function(key, val) {
                            items.push(val);
                        });

                        $.each(items, function(index, xml){
                            //console.log(index);
                            //console.log(xml);

                            var lom = processXml(xml);



                            $('#lo').append('' +
                                    '<div class="col-lg-12 col-md-12">' +
                                    '<div class="col.md-2">' +
                                    '<div class="panel panel-default">' +
                                    '<div class="panel-heading">' +
                                    '<a href="' + lom.location + '" target="_blank" class="">' + lom.title + '</a>' +
                                    '</div>' +
                                    '<div class="panel-body" style="text-align: justify;">' +
                                    '<strong>Ubicación: </strong>' + lom.coverage + '<br>' +
                                    '<strong>Descripción: </strong>' + lom.description + '<br>' +
                                    '<strong>Palabras clave: </strong>' + lom.keyword.toUpperCase() + '<br>' +
                                    '<strong>Formato: </strong>' + lom.format + '<br>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>');

                        });

                    },
                    error: function (obj, error, objError){
                        //avisar que ocurrió un error
                        console.log(obj);
                        console.log(error);
                        console.log(objError);
                    }
                });

                //Previene que se realice la redirección con el submit del formulario
                return false;
            });
        });

        function getUserProfile(){



        }

        function processXml(xml) {

            var lom = new LOMMetadata();

            lom.title = $(xml).find("lom\\:title").text();

            lom.language = $(xml).find("lom\\:language").first().text();

            lom.description = $(xml).find("lom\\:description").first().text();

            lom.format = $(xml).find("lom\\:format").text();

            lom.location = $(xml).find("lom\\:location").text();

            lom.type = $(xml).find("lom\\:type").text();

            lom.name = $(xml).find("lom\\:name").text();

            lom.minimumVersion = $(xml).find("lom\\:minimumversion").text();

            lom.maximumVersion = $(xml).find("lom\\:maximumversion").text();

            lom.interactivityType = $(xml).find("lom\\:interactivitytype").text();

            lom.learningResourceType = $(xml).find("lom\\:learningresourcetype").text();

            lom.interactivityLevel = $(xml).find("lom\\:interactivitylevel").text();

            lom.intendedEndUserRole = $(xml).find("lom\\:intendedenduserrole").text();

            lom.context = $(xml).find("lom\\:context").text();

            lom.typicalAgeRange = $(xml).find("lom\\:typicalagerange").text();

            lom.difficulty = $(xml).find("lom\\:difficulty").text();

            lom.typicalLearningTime = $(xml).find("lom\\:typicallearningtime").text();

            lom.auditory = $(xml).find("lom\\:auditory").text();

            lom.textual = $(xml).find("lom\\:textual").text();

            lom.visual = $(xml).find("lom\\:visual").text();

            lom.keyboard = $(xml).find("lom\\:keyboard").text();

            lom.mouse = $(xml).find("lom\\:mouse").text();

            lom.voiceRecognition = $(xml).find("lom\\:voicerecognition").text();

            lom.audioDescription = $(xml).find("lom\\:audiodescription").text();

            lom.hearingAlternative = $(xml).find("lom\\:hearingalternative").text();

            lom.textualAlternative = $(xml).find("lom\\:textualalternative").text();

            lom.signLanguage = $(xml).find("lom\\:signlanguage").text();

            lom.subtitles = $(xml).find("lom\\:subtitles").text();

            lom.keyword = $(xml).find("lom\\:keyword").first().text();

            lom.coverage = $(xml).find("lom\\:coverage").text();

            return lom;
        }

    </script>
@endsection