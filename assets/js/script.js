$(function(){

    $('button').bind('click', function(){
        var altura = $('#altura').val();
        var peso = $('#peso').val();

        if(altura < 1 || peso <1){
            $('#resultado').html("Preencha os campos corretamente.");
        } else{
            altura = altura.replace(',', '.');
            peso = peso.replace(',', '.');
      
            var imc = peso / (altura*altura);
        }

        if(imc <16){
            var traducao = 'Baixo peso muito grave';
        } else if(imc >=16 && imc <16.99){
            var traducao = 'Baixo peso grave';
        } else if(imc >=17 && imc <18.49){
            var traducao = 'Baixo peso ';
        } else if(imc >=18.50 && imc <24.99){
            var traducao = 'Peso normal';
        } else if(imc >=25 && imc <29.99){
            var traducao = 'Sobrepeso';
        } else if(imc >=30 && imc <34.99){
            var traducao = 'Obesidade grau I';
        } else if(imc >=35 && imc <39.99){
            var traducao = 'Obesidade grau II';
        } else if(imc >=40){
            var traducao = 'Obesidade grau III';
        }

        $('#resultado').html("Seu IMC é: "+imc.toFixed(2)+" e seu status é: "+traducao);




     
    });

});