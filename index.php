<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <title>Dori qo'shish</title>
</head>
<body>
<div class="card">
    <hr>
    <h1 align="center" class="text text-primary container">Dori qo'shish</h1>
    <form action="addProduct.php" method="post" class="container">
        <div class="mb-3">
            <label for="name" class="form-label">Dori nomi</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Dori tavsifi</label>
            <input type="text" class="form-control" id="description" name="description" required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Dori narxi</label>
            <input type="text" class="form-control" id="price" name="price" required>
        </div>
        <div class="mb-3">
            <label for="count" class="form-label">Dori soni</label>
            <input type="text" class="form-control" id="count" name="count" required>
        </div>
        <button type="submit" class="btn btn-primary">Dori qo'shish</button>
    </form>
</body>
</html>
