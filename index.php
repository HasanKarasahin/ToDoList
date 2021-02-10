<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Todo List</title>
  <link rel="stylesheet" href="assets/css/boostrap5.0.0Beta.css">
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="p-3 mb-2 bg-primary">

  <div class="form-group">
    <button type="button" class="btn btn-success btn-add" data-bs-toggle="modal" data-bs-target="#exampleAddModal" style="margin-bottom: 5px;border-radius: 5px;">Ekle</button>
    <button type="button" class="btn btn-success btn-edit" data-toggle="modal" data-target="#exampleModal" style="margin-bottom: 5px;border-radius: 5px;" disabled>Düzenle</button>
    <button type="button" class="btn btn-success btn-delete" data-toggle="modal" data-target="#deleteModal" style="margin-bottom: 5px;border-radius: 5px;">Sil</button>
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
                <th scope="col">#</th>
                <th scope="col">Yapılacak İş</th>
                <th scope="col">Oluşturulma Tarihi</th>
                <th scope="col">Bitmesi Plananlanan Tarih</th>
                <th scope="col">Durum</th>
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
        <div class="modal-body">
        <form id="exampleFormModal">
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
          <button type="button" class="btn btn-primary">Kaydet</button>
        </div>
    </div>
  </div>
</div>

  <script src="assets/js/boostrapJS.js"></script>
  <script src="assets/js/jquery3.5.1.js"></script>
  <script src="assets/js/app.js"></script>

</body>

</html>