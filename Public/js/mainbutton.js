
$(document).ready(function () {

/***************************************************************************************************
 * *************************************************************************************************
 * library functions for work js 
 *  
 */

                    /**
                    * timer finalcontdown
                    * @param {int} from 
                    * @param {int} to 
                    */
                   function renderTimer(from, to) {
                        
                    let current = from;
                
                    var timerId = setInterval(function() {

                    $('#timer').text(current);

                    if (current == to || !$('#mainBtnModal').is('.show')) {

                        clearInterval(timerId);

                        $('#mainBtnModal').modal('hide');
                    }

                    current--;
                    }, 1000);
                }

                /**
                 * delete all fields
                 * @param {node} btn 
                 */
              function dellAllAjax(btn)
              {
                let elem = btn.children('div');
                let form = $('#mainBtnModal form');
                
                //console.log($(form).attr('method'));

                    $.ajax({
                        type:$(form).attr('method'),
                        url:$(form).attr('action'),
                        data: form.serialize(), 
                        cache: false,

                        beforeSend: function(){
                    
                            $('#mainBtnModal').modal('hide');
                        },

                        success: function(result){
                            //console.log(result);
                            if(result)
                            {
                                $('#root_make_block').children('div').html(result); 
                            }
                           
                        }
                    });
              } 

/**********************************************************************************************************
 * *********************************************************************************************************
 */


/**
 * maked visible block add fields
 * if block not visible
 */
    $('#create_root').on('click',function(){

        if($('#root_make_block').hasClass('d-none')){
            $('#root_make_block').removeClass('d-none');
        }

    })
    

       /**
        * send form for add field
        */
            $( 'form #fields_form' ).submit( function( e ) {       
               
                e.preventDefault();
               
                $.ajax({
                    type: $(this).attr('method'),
                    url: $(this).attr('action'),
                    data:new FormData(this),
                    contentType: false,
                    cache:false,
                    processData:false, 

                    beforeSend: function(){
                        
                        $('#mainBtnModal').modal('hide');
                    },

                    success:function(result){
                        
                            // console.log(elem);
                                                     
                
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
    
        /********************************************************************************************
        * пришлось выкрутиться из неправильно (используется одно окно для добавления поля и удаления всех полей)
        * спланированного вызова модального окна
        *происходит типа подмены видимости содержимого для различных целей
         */
        if($('#dAll'))
            {
                 $('#dAll').remove();
                 
            }
            $('#mainBtnModal form').attr('action','form');
            $('#mainBtnModal form').children('div').fadeIn('fast');
        /**
         * ***********************************************************************************************
         */

        $('#bat').attr('data-toggle','modal');

       
    });


/**
 * удаляет input name='parent_id' after close modal
 */
    $('#close_modal').on('click',function(){
       
        $('#input_parent_id').remove();
        
    });



    /**
     * for delete childs one parent
     * 
     */
    $('.deleteChild').on('click', function(e){
        e.preventDefault;
        let elem = this;
        let idElem = $( $(this).parent() ).children('input[name ="parent_id"]').val();
        //console.log(idElem);
        $.ajax({
            type:"POST",
            url: "delchild",
            data:{
                id:idElem,
                action:'delchild'
            },
            cache: false,
            success: function(result){
               //console.log(result);
                $('#mainView').html(result);
                
            }
        });

    });



    $('.field_name').on('click',function(e){
        e.preventDefault;
        let elem = this;
        let old_name = $(elem).text();
        let idElem = $(this).parent().children('input[name ="parent_id"]').val();
        $.ajax({
            type:'POST',
            url: 'editname',
            data:{
                nameField:old_name,
                id:idElem
            },
            cache:false,
            success: function(result){
                //console.log();
               let parent = $(elem).parent().parent();
                $(parent).append(result);
                $(parent).children('.content').css({"display":"none"});
                //$(parent).children('.content').fadeOut('slow');
 
            }
        });
    });



 
    /**
     * edit name field
     */
 $(document).on('click', function(e){

       let target = $(e.target);
       
      let elem = this;
      let parentElem = $('#edit_name');
      let nodeId = $(target).attr('id')
        

      
         if( nodeId != 'name_edit' && nodeId != 'update_name' )
         {
           
            let parent = $(parentElem).parent();                   
                    $(parent).children('.content').fadeIn('slow');
                    $(parentElem).remove();
                    
         }
              
                });

  
    
               

                /**
                 * update name field
                 */
                $(document).on('click','#update_name',function(e){
                       e.preventDefault;
                       let parent = $(this).parent();
                      let form = $(parent).serialize();
                      
                      $.ajax({
                          url:$(parent).attr('action'),
                          type:$(parent).attr('method'),
                          data:form,
                          cache:false,
                          success:function(result)
                          {
                              //console.log(result);
                              $('#mainView').html(result);
                          }
                      });
                   });
                
                
               

                   
                   $(document).on('click', function(e)
                   {
                    e.preventDefault;
                    let target = $(e.target);
                    let nodeId = $(target).attr('id');

                    if( nodeId == 'btn_del_all')
                               {
                                console.log(nodeId);
                                 btn = $('#root_make_block');
                                dellAllAjax(btn);
                               }
                   
                    if( nodeId == 'delTree')
                    {
                        
                    
                       
                       $.ajax({
                           url:'predeleteAll',
                           type:'POST',
                           data:{id:0},
                           success:function(result)
                           {
                              
                               if($('#dAll'))
                               {
                                $('#dAll').remove();
                               }

                              let oldForm = $('#mainBtnModal').children('form');
                              $(oldForm).children('div').css({'display':'none'});
                              $(oldForm).append(result);
                              $(oldForm).attr('action','delall');
                             
                              $('#dAll').css({'display':'block'});

                               $('#mainBtnModal').modal('show');

                                   renderTimer(10,0);
                                   
                                  
                               
                               $('#delTree').attr('data-toggle','modal');

                               

                           }
                       });

                    }


                   });



                   

});