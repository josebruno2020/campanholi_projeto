//const BASE_URL = 'http://www.autoiluminacao.com.br/';
const BASE_URL = 'http://localhost/campanholi_projeto/';
$(document).ready(function(){

    //Função para o menu ser acionado no modo mobile;
    $('#img-menu').bind('click', function(){
        $('.menu').slideToggle('fast');
    });

    

    $('li').hover(function(){
        $(this).find('#dropdown').show();
    }, function(){
        $(this).find('#dropdown').hide();
    });
    //Função para o filtro de produtos;
    $('#produto-filtro').keyup(function(){

        $('#form-usuario').submit(function(e){
            e.preventDefault();
            var txt = $(this).serialize();
            
            $.ajax({
                url:'/campanholi_projeto/ajax/filtro/',
                type:'post',
                data:txt,
                success:function(data){
                    $('#filtro-resultado').empty().html(data);
                    console.log(txt);
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
            url:'/campanholi_projeto/ajax/',
            type:'post',
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




