$(function(){
    function getMunicipios(departamento){
        $.ajax({
            url:"/municipios/"+departamento,
            method: 'GET',
            data: null,
            success: function(municipios){
                municipios = JSON.parse(municipios);
                for (var i=0; i<municipios.length; i++ ){                
                    municipio = municipios[i];            
                    $('#municipio').append("<option value="+municipio.idmunicipio+">"+municipio.municipio+"</option>");
                }
            }
        });

    };
    $('#departamento').change(function($e){
        //alert($($e.target).val());
        $('#municipio').empty();
        getMunicipios($($e.target).val());
    });
});

$(function(){
    function boxtipofalla(electrodomestico){
        $.ajax({
            url:"/tipofalla/"+electrodomestico,
            method: 'GET',
            data: null,
            success: function(tipofalla){
                tipofalla = JSON.parse(tipofalla);
                for (var i=0; i<tipofalla.length; i++ ){                
                    tipofalla = tipofalla[i];            
                    $('#tipofalla').append("<option value="+tipofalla.idfalla+">"+tipofalla.falla+"</option>");
                }
            }
        });

    };
    $('#electrodomestico').change(function($e){
        //alert($($e.target).val());
        $('#tipofalla').empty();
        boxtipofalla($($e.target).val());
    });
});



       

