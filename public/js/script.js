$(document).ready(function () {
    /**
     *Get all the data needed to process the forms  
     * 
     * 
     */

    //#region Dom elements 
        $removeModal = $('#removeModal');
        $closeBtn = $('.close-btn');
        $removeBtn = $('.remove');
        $noBtn = $('#removeModal a:last-of-type');
        $addBtn = $('.add');
        console.log($addBtn);
        $createItemModal = $('#createItemModal');
    //#endregion
    
    /**
     * REGISTRATION VALIDATION
     * 
     * 
     */

     //Get the form
     let $registerForm = $('#signup');
     //Get the error messages
     let $nameError = $('.nameError');
     let $emailError = $('.emailError');
     let $usernameError = $('.usernameError');
     let $passwordError = $('.passwordError');

    


     //Get the fields

    /**
     * 
     * END OF THE REGISTER VALIDATION
     */
    //#region Modal Boxes
        //Open the modal for removing items
        $removeBtn.on('click', function () { 
            $removeModal.addClass('show-me');
        });
        //Open the modal for adding items
        $addBtn.on('click', function(){
            $createItemModal.addClass('show-me');
        });
        //Close the modal when the no btn is clicked.
        $noBtn.on('click', function(){
            $removeModal.removeClass('show-me');
        });
        
        //Close the modal when the x is clicked
        $closeBtn.on('click', function(){
            $removeModal.removeClass('show-me');
            $createItemModal.removeClass('show-me');
        });
    //#endregion

    //Close the modal box
});

