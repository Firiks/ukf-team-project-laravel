$(function(){
    // DELETE MODAL
    var form;

    $(document).on("click", ".delete-button", function(){
        $('.delete-name').text($(this).data('entity'));
        form = $(this).parent();

        $('.modal-delete').modal();
    });

    $(document).on("click", "#delete-confirm", function(){
        form.submit();
    });


});
