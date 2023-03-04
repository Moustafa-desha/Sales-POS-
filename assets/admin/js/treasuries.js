$(document).ready(function (){
    $(document).on('input','#search_by_text',function (e){
       let search_by_text = $(this).val();
        let token_search = $("#token_search").val();

       $.ajax({
           type: "post",
           url: 'ajax_search',
           data: {search_by_text:search_by_text,'_token':token_search},
           cache: false,

           success:function (data){
            $("#ajax_response_searchDiv").html(data);
        },
           error:function(){

        }
       });


    });


    $(document).on('click','#ajax_pagination a',function (e){

        e.preventDefault();
        let search_by_text = $(this).val();
        let token_search = $("#token_search").val();
        let url = $(this).attr("href");


        $.ajax({
            type: "post",
            url: url,
            data: {search_by_text:search_by_text,'_token':token_search},
            cache: false,

            success:function (data){
                $("#ajax_response_searchDiv").html(data);
            },
            error:function(){

            }
        });

    });

});
