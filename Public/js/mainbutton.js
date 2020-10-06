
$(document).ready(function () {



    $('#create_root').on('click',function(){

        if($('#root_make_block').hasClass('d-none')){
            $('#root_make_block').removeClass('d-none');
        }

    })
    

       
            $( 'form #fields_form' ).submit( function( e ) {       
               
                e.preventDefault();
               
                $.ajax({
                    type: $(this).attr('method'),
                    url: $(this).attr('action'),
                    data:new FormData(this),
                    data:form,
                    contentType: false,
                    cache:false,
                    processData:false, 

                    beforeSend: function(){
                        
                        $('#mainBtnModal').modal('hide');
                    },

                    success:function(result){
                        
                            // console.log(elem);
                            // // console.log(this.closest("div"));
                            // elem.append().html(result);
                       
                            
                            //location.reload();
                
            }

            });



    }); 
    

    /**
     * get category field
     * and saved in session for send to server
     * (и сохраняем в сессию чтобы передать 
     * на сервер аяксом вместе с именем поля)
     */
    $('.add_field').on('click',function(e){
        e.preventDefault();
        let parent = $(this).parent('div');
       
        let parent_id = $(parent).children('input').val();
        
        if(parent_id == undefined){
            parent_id = 0;
        }

        $('#mainBtnModal .field').append("<input type='hidden' name='parent_id' value='"+parent_id+"' id='input_parent_id'>");
            
        sessionStorage.setItem('parent_id',parent_id);
    

        $('#bat').attr('data-toggle','modal');

       
    })


/**
 * удаляет input name='parent_id' after close modal
 */
    $('#close_modal').on('click',function(){
       
        $('#input_parent_id').remove();
        
    })



    
    $('#delTree').on('click', function(){
       
        let elem = this.closest('div');

        $.ajax({
            type:"post",
            url:"delall",
            contentType:false,
            cache: false,
            success: function(result){
                console.log(result);
                $(elem).children().not('button').remove();
            }
        });
    })

});