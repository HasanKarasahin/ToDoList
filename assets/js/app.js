$(document).ready(function () {

    $.post({
        url: window.location.href + "/Data/Todo/Data_Todo_AllData.php",
        data: {name: "Hasan", surname: "Karasahin"},
        success: function (data) {
            console.table(data);
            $("tbody").append(data);
        },
        error: function (e) {
            alert("error");
        }
    });

    var exampleAddModal = document.getElementById('exampleAddModal')
    //var modalBodyButton = exampleAddModal.querySelector('.modal-footer .btn.btn-primary')
    //var modalForm = exampleAddModal.querySelector('.modal-body #exampleFormModal')
    /*
            $(modalBodyButton).click(function () {
                $.post({
                    url: "Actions/ToDo/Action_Todo_Add.php",
                    data: $(modalForm).serialize(),
                    success: function(data) {
                        console.table(data);
                        $("tbody").append(data);
                    },
                    error:function(e){
                        alert("error");
                        console.log(e);
                    }
                  });
            })*/


    /*var exampleUpdateModal = document.getElementById('exampleUpdateModal')
    var modalBodyUpdateButton = exampleUpdateModal.querySelector('.modal-footer .btn.btn-primary')
    var modalUpdateForm = exampleUpdateModal.querySelector('.modal-body #exampleFormModal')

    $(modalBodyUpdateButton).click(function () {
        $.post({
            url: window.location.href+"/Actions/ToDo/Action_Todo_Update.php",
            data: $(modalUpdateForm).serialize(),
            success: function(data) {
                console.table(data);
                $("tbody").append(data);
            },
            error:function(e){
                alert("error");
                console.log(e);
            }
          });
    })*/


    exampleAddModal.addEventListener('show.bs.modal', function (event) {
        // Button that triggered the modal
        var button = event.relatedTarget
        // Extract info from data-bs-* attributes
        var recipient = button.getAttribute('data-bs-whatever')
        // If necessary, you could initiate an AJAX request here
        // and then do the updating in a callback.

    });





    $('#exampleUpdateModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var modal = $(this)
        modal.find('#id').val(button.data('todo-id'))
        console.log(modal.find('.btnUpdate'));

        $.post({
            url: window.location.href + "/Data/Todo/Get_Data.php",
            data: {id: button.data('todo-id')},
            dataType: "json",
            success: function (responseData) {

                modal.find('input[name="toDo"]').val(responseData[0].todo);
                modal.find('input[name="endDate"]').val(responseData[0].endDateFormat);

                //
                console.log(responseData[0]);

            },
            error: function (err) {
                console.log("Error. Method:postAjax")
            }
        });



        modal.find('.btnUpdate').click(() => {
            $.post({
                url: window.location.href + "Actions/ToDo/Action_Todo_Update.php",
                data: $(exampleUpdateFormModal).serialize(),
                success: function (data) {
                    console.table(data);
                    //$("tbody").append(data);
                },
                error: function (e) {
                    alert("error");
                    console.log(e);
                }
            });
        });


        /*
         var recipient = button.data('whatever') // Extract info from data-* attributes
         // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
         // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
         var modal = $(this)
         modal.find('.modal-title').text('New message to ' + recipient)
         modal.find('.modal-body input').val(recipient)*/
    })


});