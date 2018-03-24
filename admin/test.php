<?php
/**
 * Created by PhpStorm.
 * User: Sebahattin ALTUNAY
 * Date: 23.03.2018
 * Time: 08:24
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Basic Modal Example</h2>
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#gelen">Gelen Kutusu</button>
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#sent">Giden Kutusu</button>

  <!-- Inbox -->
  <div class="modal fade" id="gelen" role="dialog">
    <div class="modal-dialog">

      <!-- Inbox content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">sebo@test.com</h4>
        </div>
        <div class="modal-body">
          <p>Buraya mesaj gelecek...</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
        </div>
      </div>

    </div>
  </div>

    <!-- Sent -->
    <div class="modal fade" id="sent" role="dialog">
        <div class="modal-dialog">

            <!-- Sent content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">sebo@test.com</h4>
                </div>
                <div class="modal-body">
                    <p>Burada giden mesaj gözükecek...</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
                </div>
            </div>

        </div>
    </div>

</div>

</body>
</html>