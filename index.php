<?php ob_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Todo List</title>
  <link rel="stylesheet" href="assets/css/boostrap5.0.0Beta.css">
  <link rel="stylesheet" href="assets/css/style.css">


  <script src="assets/js/jquery3.5.1.js"></script>
<script>


    function fnDelete($id) {

        $filePath="Todo/Action_Todo_Delete";

        $.post({
        url: "/Actions/"+$filePath+".php",
        data: {id:$id},
        success: function(data) {

            $( "tr[data-item-id='"+$id+"']" ).hide();

        },
        error:function(err){
          console.log("Error. Method:postAjax")
        }
      });
    }

    function fnUpdate($id) {

/*
      $('#exampleAddModal').modal('toggle');
      let exampleAddModal = document.getElementById('exampleAddModal');
      let modalBodyButton = exampleAddModal.querySelector('.modal-footer .btn.btn-primary')


      console.log($("#exampleAddModal"));*/

      $filePath="Todo/Action_Todo_Update"

      $.post({
        url: "/Actions/"+$filePath+".php",
        data: {id:$id,toDo:'Yeni',endDate:'17.03.1996'},
        success: function(data) {

          //TO-DO Güncellenecek.
            $( "tr[data-item-id='"+$id+"']" );

        },
        error:function(err){
          console.log("Error. Method:postAjax")
        }
      });


    }

    function postAjax($id,$filePath) {
      $.post({
        url: "/Actions/"+$filePath+".php",
        data: {id:$id},
        success: function(data) {

            $( "tr[data-item-id='"+$id+"']" ).hide();

        },
        error:function(err){
          console.log("Error. Method:postAjax")
        }
      });
    }

</script>

</head>

<body class="p-3 mb-2 bg-primary">

  <div class="form-group">
    <button type="button" class="btn btn-success btn-add" data-bs-toggle="modal" data-bs-target="#exampleAddModal" style="margin-bottom: 5px;border-radius: 5px;">Ekle</button>
    <input type="text" class="form-control" id="myInput" placeholder="Arama" style="width: 250px;float: right;border: 1px solid green;border-radius: 5px;">
  </div>


 
  <div class="row">
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
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <input type="text" class="form-control" name="endDate" placeholder="Bitmesi planlanan tarih" required>
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
<div class="modal fade" id="exampleUpdateModal" tabindex="-1" aria-labelledby="exampleUpdateModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleUpdateModalLabel">To-Do Düzenle</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body">
        <form id="exampleFormModal">
              <input type="hidden" name="id" value="0">
              <div class="form-group">
                <input type="text" class="form-control" name="toDo" placeholder="Yapılacak iş" required>
              </div>
              <br/>
              <div class="form-group">
                <input type="text" class="form-control" name="endDate" placeholder="Bitmesi planlanan tarih" required>
              </div>
        </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
          <button type="button" class="btn btn-primary">Güncelle</button>
        </div>
    </div>
  </div>
</div>

  <script src="assets/js/boostrapJS.js"></script>
 
  <script src="assets/js/app.js"></script>

</body>

</html>