$(document).ready(function () {
    $removeModal = $('#removeModal');
    $closeBtn = $('.close-btn');
    $removeBtn = $('.remove');
    $noBtn = $('#removeModal a:last-of-type');
    $addBtn = $('.add');
    $createItemModal = $('#createItemModal');

    //Open the modal for removing items
    $removeBtn.on('click', function () { 
        $removeModal.addClass('show-me');
    });


    //Open the modal for adding items
    $addBtn.on('click', function(){
        $createItemModal.addClass('show-me');
    });

    //Close the modal box
    $noBtn.on('click', function(){
        $removeModal.removeClass('show-me');
    });
    
    //Close the modal when the x is clicked
    $closeBtn.on('click', function(){
        $removeModal.removeClass('show-me');
        $createItemModal.removeClass('show-me');
    });

    /**
     * FORMS ADD ITEM AND FORM REMOVE ALL
     * 
     * 
     */

     //Get the form
     let $addItem = $('#addItem');
     let errorMsg = "Empty Field"
     let erroMsgSpan = "<span class=\"error\"></span>"

     //Validate the form and prevent from submiting it;
     $addItem.on('submit', function(ev){
         let $item_title_value = $('#addItem input[type=text]').val();        
         ev.preventDefault();
         if(!validate()){
            /**Enter the error in the msg box and display the box */
         }else{
             /**Submit the form using ajax */
             $.post("addItem.php", $item_title_value,
                 function (data, textStatus, jqXHR) {
                 },
                 "dataType"
             ).sucess(function(){

             }).finaly(function(){

             });
         }
         console.log($item_title_value);
         
     });

     function validate($items = []){
        let error = false;
        if($item_title_value == ""){
             return true;
         }

         return false;
     }
     
});

