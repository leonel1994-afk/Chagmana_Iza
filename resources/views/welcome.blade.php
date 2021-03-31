<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaluación</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <script type="text/javascript">
    
      $(document).ready(function(){
        sessionStorage.removeItem('acumulado');
        $("#btnCalcular").click(function(){
            var base=$("#txtBase").val();
            var exponente=$("#txtExponente").val();

            if(base!="" && exponente!=""){
                var resultado=0;
                if(exponente==0){
                    resultado=1;
                }else if(exponente==1){
                    resultado=base;
                }else{
                    resultado=calcularPotencia(base,exponente);
                }
                if(sessionStorage.getItem('acumulado')!=null){
                    var acumulado=resultado+Number(sessionStorage.getItem('acumulado'));
                    sessionStorage.setItem('acumulado',acumulado);
                }else{
                    sessionStorage.setItem('acumulado',resultado);
                }
                $("#txtPotencia").val(resultado);
                $("#txtAcumulado").val(sessionStorage.getItem('acumulado'));
                $("#mensajeTexto").remove();
            }else{
                $("#mensaje").html("<div id=\"mensajeTexto\" name=\"mensajeTexto\">Error: Existe campos vacios.</div>")
            }

        });
    });

    function calcularPotencia(base,exponente){
        var vBase=Number(base);
        var vExponente=Number(exponente);

        var r = 0;
        var n = 1;
        var cont1 = 0;
        do {
            r = 0;

            var cont2 = 0;
                do {
                    r += n;
                    cont2++;
                } while (cont2 < vBase);
            n = r;
            cont1++;
        } while (cont1 < vExponente);

        return r;        
    }

    </script>

</head>
<body>
    <div class="container" style="text-align:center;">
        <p style="color:red;font-size:30px;text-align:center;margin-top:20px">Evaluación Laravel</p>
        <input type="number" id="txtBase" name="txtBase" placeholder="Base" style="margin-top:10px; width:200px" min="0" max="99999"/>
        <br>
        <input type="number" id="txtExponente" name="txtExponente" placeholder="Exponente" style="margin-top:10px; width:200px" min="0" max="99999"/>
        <br>
        <input type="number" id="txtPotencia" name="txtPotencia" placeholder="Potencia" style="margin-top:10px; width:200px" readonly/>
        <br>
        <input type="button" class="btn btn-primary" id="btnCalcular" name="btnCalcular" value="Calcular" style="margin-top:10px;"/>
        <br>
        <input type="number" id="txtAcumulado" name="txtAcumulado" placeholder="Acumulado" style="margin-top:10px; width:200px" readonly/>
        <br>
        <div id="mensaje" name="mensaje" style="margin-top:20px;color:red"></div>
    </div>    
</body>
</html>