<!DOCTYPE html>
<html lang="en">
<head>
  <title>DNS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="#">Chuyển đổi DNS</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
</nav>

<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Type</th>
      <th scope="col">Tên miền</th>
      <th scope="col">Target</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php
      if (!empty($table)) {

          foreach ($table as $key => $value){
    ?>
    <tr>
      <td><?php echo $value->type; ?></td>
      <td><?php echo $value->tenmien; ?></td>
      <td><?php echo $value->target; ?></td>
      <td>
        <a class="font-medium" href="{{'deletedns/'.$value->id}}">Delete</a>
      </td>
    </tr>
    <?php
            }
        }
    ?>
  </tbody>
</table>
<tfoot>
    <tr>
        <td >
            <a class="btn btn-primary" type="submit" href="{{'cloud'}}">Add DNS</a>
        </td>
        
    </tr> 
</tfoot>


</body>
</html>