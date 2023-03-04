$(document).ready(function (){
    $(document).on('click','#update_logo',function (e){
       e.preventDefault();
       if (!$('#photo').length){
           $('#update_logo').hide();
           $('#cancel_update_logo').show();
           $('#oldLogo').html('<br><input type="file" name="photo" id="photo">');
       }
       return false;
    });
});

$(document).ready(function (){
    $(document).on('click','#cancel_update_logo',function (e){
        e.preventDefault();

            $('#update_logo').show();
            $('#cancel_update_logo').hide();
            $('#oldLogo').html('');

        return false;
    });
});
