//const BASE_URL = 'http://a739b7055129.ngrok.io/campanholi_projeto/public/';
const BASE_URL = 'http://localhost/campanholi_projeto/public/';
$(document).ready(function(){
    

    $('li').hover(function(){
        $(this).find('#dropdown').show();
    }, function(){
        $(this).find('#dropdown').hide();
    });

    $('#produto-filtro').keyup(function(){

        $('#form-usuario').on('submit',function(e){

            var txt = $(this).serialize();
            
            $.ajax({
                url:BASE_URL+'ajax/filtro',
                type:'get',
                data:txt,
                success:function(data){
                    $('#filtro-resultado').empty().html(data);
                }
            });
            return false;

        });

        $('#form-usuario').trigger('submit');
    });

    //Funcão para a página de vendas, buscar pelo nome do produto para preencher o campo específico;
    var campo = new Array();
    $('.produto-campo').bind('keyup', function(){
        var position = $(this).offset();
        var width = $(this).width();

        $('.venda-produto').css('left', position.left);
        $('.venda-produto').css('top', position.top - 92);
        campo = $(this);
        
        $.ajax({
            url:BASE_URL+'ajax',
            type:'get',
            data:campo,
            success:function(data){
                $('.venda-produto').empty().html(data);
                
            }
        });
        
        $('.venda-produto').show();
        $(document).on('click', '.item-produto', function(){
            var item = $('.item-produto').html();
            $(campo).val(item);
           
        });    
        
    });
    
    
    
    $('.produto-campo').bind('blur', function(){
        //Com essa função, demora 200 mili segundos para sumir o elemento;
        setTimeout(function(){
            $('.venda-produto').hide();
        }, 250);
    });
    //Passando o mouse, ele adiciona o valor para o input;
    
});




