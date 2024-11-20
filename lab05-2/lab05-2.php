<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab05-2</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
    <style>
        body {
    background-color: #FBE8E8; /* Soft pink background to complement #F29089 */
    font-family: 'Kanit', sans-serif;
    color: #333;
}

h2 {
    color: #F29089; /* Updated header color */
    font-weight: bold;
}

.container {
    max-width: 500px;
    background-color: #fff;
    padding: 20px;
    margin: 50px auto;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    border: 1px solid #F29089; /* Updated border color */
    border-radius: 10px;
}

.form-label {
    color: #F29089; /* Updated label color */
    font-weight: bold;
}

.btn-calculate {
    background-color: #F29089; /* Updated button color */
    border: none;
    color: #fff;
    padding: 10px 20px;
    cursor: pointer;
    border-radius: 5px;
    transition: background-color 0.3s;
}

.btn-calculate:hover {
    background-color: #d77b72; /* A slightly darker shade for hover effect */
}
    </style>
</head>
<body>
    <div class="container">
        <form action="?p=lab05-2-2" method="POST">
            <div class="mb-3">
            <h2>รายการสินค้า</h2>
                <label for="code" class="form-label">รหัสสินค้า :</label>
                <input type="number" id="code" name="code" class="form-control" value="98765432111" readonly>
            </div>
            <div class="mb-3">
                <label for="product" class="form-label">ชื่อสินค้า :</label>
                <input type="text" name="product" class="form-control" placeholder="สินค้า" value="อิชิตัน" readonly>
            </div>
            <div class="mb-3">
                <label for="productnum" class="form-label">จำนวนสินค้า :</label>
                <input type="number" name="productnum" class="form-control" placeholder="จำนวนสินค้า" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">ราคาสินค้า :</label>
                <input type="number" name="price" class="form-control" placeholder="ราคา" value="15" readonly>
            </div>
            <hr>
            <button type="submit" class="btn btn-success btn-calculate btn-block">คำนวณ</button>
        </form>
    </div>
</body>
</html>
