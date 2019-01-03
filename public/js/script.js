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
});

