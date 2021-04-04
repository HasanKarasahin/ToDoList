<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

ob_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo List</title>
    <link rel="stylesheet" href="assets/css/boostrap5.0.0Beta.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <script src="assets/js/jquery3.5.1.js"></script>
    <script>


        function fnDelete($id) {

            $filePath = "Todo/Action_Todo_Delete";
            console.log($id);
            $.post({
                url: window.location.href + "/Actions/" + $filePath + ".php",
                data: {id: $id},
                success: function (data) {

                    $("tr[data-item-id='" + $id + "']").hide();

                },
                error: function (err) {
                    console.log("Error. Method:postAjax")
                }
            });
        }

        function fnUpdate($id) {

            $filePath = "Todo/Action_Todo_Update"

            $.post({
                url: window.location.href + "/Actions/" + $filePath + ".php",
                data: {id: $id, toDo: 'Yeni', endDate: '17.03.1996'},
                success: function (data) {

                    //TO-DO Güncellenecek.
                    $("tr[data-item-id='" + $id + "']");

                },
                error: function (err) {
                    console.log("Error. Method:postAjax")
                }
            });


        }

        function postAjax($id, $filePath) {
            $.post({
                url: "/Actions/" + $filePath + ".php",
                data: {id: $id},
                success: function (data) {

                    $("tr[data-item-id='" + $id + "']").hide();

                },
                error: function (err) {
                    console.log("Error. Method:postAjax")
                }
            });
        }

        function fnSearch(){

            var $searchData =  $('#searchInput').val();


            $.post({
                url: window.location.href +"Data/Todo/Data_Todo_Search.php",
                data: {data: $searchData},
                success: function (responseData) {

                    console.log(responseData);

                    $("tbody").html('');
                    $("tbody").append(responseData);

                    //$("tr[data-item-id='" + $id + "']").hide();

                },
                error: function (err) {
                    console.table(err);
                }
            });
        }

    </script>

</head>

<body class="p-3 mb-2">

<div class="form-group" style="display: flex;justify-content: space-between">




    <button type="button" class="btn btn-success btn-add" data-bs-toggle="modal" data-bs-target="#exampleAddModal"
            style="margin-bottom: 5px;border-radius: 5px;">
        <i class="fa fa-plus"></i>
    </button>


    <div style="width: 300px;display:flex;border-radius: 5px;margin-bottom: 5px">
        <input type="text" class="form-control" id="searchInput" placeholder="Arama">
        <button type="button" class="btn btn-success" onclick="fnSearch()">
            <i class="fa fa-search"></i>
        </button>

    </div>

</div>


<div class="row content">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Todo List</h5>
                <p class="card-text">


                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Sıra</th>
                        <th scope="col">Yapılacak İş</th>
                        <th scope="col">Oluşturulma Tarihi</th>
                        <th scope="col">Bitmesi Plananlanan Tarih</th>
                        <th scope="col">Durum</th>
                        <th scope="col">İşlemler</th>
                    </tr>
                    </thead>
                    <tbody id="myTable">


                    </tbody>
                </table>

                </p>
            </div>
        </div>
    </div>
</div>

<!--MODAL1(DELETE)-->

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Veri silinecek?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Seçtiginiz veri silinecek onaylıyor musunuz?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                <button type="button" class="btn btn-primary btn-modal-ok">Sil</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleAddModal" tabindex="-1" aria-labelledby="exampleAddModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleAddModalLabel">To-Do Ekle</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="exampleFormModal" METHOD="post" Action="Actions/ToDo/Action_Todo_Add.php">
                <div class="modal-body">

                    <div class="form-group">
                        <input type="text" class="form-control" name="toDo" placeholder="Yapılacak iş" required>
                    </div>
                    <br/>
                    <div class="form-group">
                        <input type="datetime-local" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2} [0-9]{2}:[0-9]{2}:[0-9]{2}" class="form-control" name="endDate" placeholder="Bitmesi planlanan tarih"
                               required>


                    </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
                    <button type="submit" class="btn btn-primary">Kaydet</button>
                </div>
        </div>
        </form>
    </div>
</div>


<!-- Modal1 -->
<div class="modal fade" id="exampleUpdateModal" tabindex="-1" aria-labelledby="exampleUpdateModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleUpdateModalLabel">To-Do Düzenle</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="exampleUpdateFormModal" onsubmit="return false">
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="id" id="id" value="0">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="toDo" placeholder="Yapılacak iş" required>
                    </div>
                    <br/>
                    <div class="form-group">
                        <input type="datetime-local" class="form-control" name="endDate" placeholder="Bitmesi planlanan tarih"
                               required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
                <button type="button" class="btn btn-primary btnUpdate">Güncelle</button>
            </div>
        </div>
    </div>
</div>

<script src="assets/js/boostrapJS.js"></script>

<script src="assets/js/app.js"></script>

</body>

</html>