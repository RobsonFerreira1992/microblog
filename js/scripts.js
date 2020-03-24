/* INÍCIO - Manipulação da imagem do post */
 $("#imagem").on("change", function(){    
    console.log( $(this).val().replace(/C:\\fakepath\\/i, '') );
    $("#imagem-existente").val( $(this).val().replace(/C:\\fakepath\\/i, '') );    
});     
/* FIM - Manipulação da imagem do post */

/* ************** */

/* INÍCIO - Manipulação do link Excluir usado nas páginas
posts.php e usuarios.php */
var link;    
    
$("td").on("click", "a.excluir", function(){
    link = $(this).attr("href");
});
    
$('#myModal').on('shown.bs.modal', function () {
    $('#myInput').trigger('focus');
    $("#sim").on("click", function(){
        location.href = link;
    });    
});
/* FIM - Manipulação do link Excluir usado nas páginas
posts.php e usuarios.php */
