    <!doctype html>
    <html lang="en">
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <title>Hello, world!</title>
    <style>
        .jumbotron {
                background-image: url("<?=base_url('assets/img/bg.png')?>");
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center;
                background-size: 600px 200px;
                /* background-attachment: fixed; */
                height: 50vh;
            }
    </style>
    </head>
    <body>
    <div class="jumbotron">
        <h1 class="display-4 text-center ">Data Provinsi & Kabupaten Indonesia</h1>
        
        
    </div>
    
    <div class="container">
    <div id="status"></div>
        <div id="provinsi"></div>
        <div id="kabupaten"></div>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

    <!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js" ></script> -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    -->

    <script>
 $(document).ready(function() {

        

    dataIndodaxAPI();
    function dataIndodaxAPI(){
        $.ajax({
            type: 'GET',
            url: 'https://x.rajaapi.com/MeP7c5neXnwECrPR7H1MW4Tg2VfYE1MuUJ2sUYhR419ZyNu4v7MzV6fFPM/m/wilayah/provinsi',
            dataType: 'json',
            success: function (data) {
                // console.log(data);
                html = '';
                html +='<div class="row row-cols-1 row-cols-md-3">';
                $.each(data.data, function(index, element) { 
                    // console.log(element.name);
                    html += '<div class="col mb-4">'
                            +'<div class="card ">'
                            +'<div class="card-body">'
                            +'<h5 class="card-title">'+element.name+'</h5>'
                            +'<p class="card-text"></p>'
                            +'<button class="btn btn-primary" type="submit" name="detailID" id="detailID" data-id="'+element.name+'" value="'+element.id+'">Detail</button>'
                            +'</div>'
                            +'</div>'
                            +'</div>';
                }); 
                html +='</div>';
                $('#provinsi').html(html);

            }
        });

    }

    $(document).on('click','#detailID', function(){
        // var a = $(this).attr("value");
        $('#provinsi').addClass('d-none');
        var id = $(this).val();
        var dataNama = $(this).data('id');
        var html = '';
        // var id = $(this).val();
        // console.log(id);
        // console.log(data);
        $.ajax({
            type: 'GET',
            url: 'https://x.rajaapi.com/MeP7c5neXnwECrPR7H1MW4Tg2VfYE1MuUJ2sUYhR419ZyNu4v7MzV6fFPM/m/wilayah/kabupaten?idpropinsi='+id,
            dataType: 'json',
            success: function (data) {
                // html = '';
                // console.log(data);
                html = '';
                html +='<div class="row row-cols-1 row-cols-md-3">';
                $.each(data.data, function(index, element) { 
                    html += '<div class="col mb-4">'
                            +'<div class="card ">'
                            +'<div class="card-body">'
                            +'<h5 class="card-title">'+element.name+'</h5>'
                            +'<p class="card-text"></p>'
                          
                            +'</div>'
                            +'</div>'
                            +'</div>';
                }); 
                html +='</div>';
                $('#status').html("Provinsi : "+dataNama);
                $('#kabupaten').html(html);

            }
        });
    });


   
    });
    </script>
    </body>
    </html>