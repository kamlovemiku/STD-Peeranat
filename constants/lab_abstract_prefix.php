<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แสดงผล Prefix</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
            background-color: #f4f4f9;
        }
        h1 {
            color: #333;
        }
        .container {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            max-width: 600px;
            margin: 0 auto;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .result {
            background-color: #f1f1f1;
            padding: 10px;
            border: 1px solid #ddd;
            margin-bottom: 20px;
            border-radius: 5px;
        }
        .code-box {
            background-color: #272822;
            color: #f8f8f2;
            padding: 20px;
            border-radius: 5px;
            font-family: 'Courier New', Courier, monospace;
            overflow-x: auto;
        }
        .code-box code {
            color: #66d9ef;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>ผลลัพธ์ของการเรียกใช้งานเมธอด Prefix</h1>

    <div class="result">
        <?php
        abstract class ParentClass {
            // Abstract method with an argument
            abstract protected function prefixName($name,$myname);
        }

        class ChildClass extends ParentClass {
            public function prefixName($name,$myname) {
                if ($name == "1") {
                    $prefix = "นาย";
                } elseif ($name == "2") {
                    $prefix = "นางสาว";
                } else {
                    $prefix = "other";
                }
                return "{$name}. {$prefix} {$myname} ";
            }
        }

        $class = new ChildClass;
        echo $class->prefixName("1","พีรณัฐ");
        echo "<br>"; 
        echo $class->prefixName("2","ราชมงคลลำปาง");
        echo "<br>"; 
        echo $class->prefixName("3","rmutll")."<br>";
        ?>
    </div>

    <h2>โค้ดที่ใช้</h2>
    <div class="code-box">
        <code>
            &lt;?php<br>
            abstract class ParentClass {<br>
            &nbsp;&nbsp;// Abstract method with an argument<br>
            &nbsp;&nbsp;abstract protected function prefixName($name,$myname);<br>
            }<br><br>
            
            class ChildClass extends ParentClass {<br>
            &nbsp;&nbsp;public function prefixName($name,$myname) {<br>
            &nbsp;&nbsp;&nbsp;&nbsp;if ($name == "1") {<br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$prefix = "นาย";<br>
            &nbsp;&nbsp;&nbsp;&nbsp;} elseif ($name == "2") {<br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$prefix = "นางสาว";<br>
            &nbsp;&nbsp;&nbsp;&nbsp;} else {<br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$prefix = "other";<br>
            &nbsp;&nbsp;&nbsp;&nbsp;}<br>
            &nbsp;&nbsp;&nbsp;&nbsp;return "{$name}. {$prefix} {$myname} ";<br>
            &nbsp;&nbsp;}<br>
            }<br><br>
            
            $class = new ChildClass;<br>
            echo $class->prefixName("1","พีรณัฐ");<br>
            echo "&lt;br&gt;";<br>
            echo $class->prefixName("2","ราชมงคลลำปาง");<br>
            echo "&lt;br&gt;";<br>
            echo $class->prefixName("3","rmutll")."&lt;br&gt;";<br>
            ?&gt;
        </code>
    </div>
</div>

</body>
</html>
