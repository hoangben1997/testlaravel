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

<form class="row g-3" method="POST">
	@csrf
  <div class="col-md-4">
    <label for="validationDefault01" class="form-label">Tên miền</label>
    <input type="text" class="form-control" name="tenmien" placeholder="Domain" id="validationDefault01" value="" >
  </div>
  <div class="col-md-4">
    <label for="validationDefault02" class="form-label">Target:</label>
    <input type="text" class="form-control" name="target" id="validationDefault02" value="" >
  </div>
  <div class="col-md-3">
    <label for="validationDefault03" class="form-label">Type:</label>
    <br>
    <select class="form-select" name="type" id="validationDefault03" >
      <option value="A">A</option>
      <option value="AAAA">AAAA</option>
      <option value="CERT">CERT</option>
      <option value="CNAME">CNAME</option>  
    </select>
  </div>
  
  <div class="col-12">
    <button class="btn btn-primary" type="submit" id="button_insert">ADD</button>
  </div>
</form>
</body>
</html>