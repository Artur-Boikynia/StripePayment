<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script type="text/javascript">

    $("document").ready(function(){
       $('#button').click(function (){
           var record = $("form").serialize();
           $.ajax(
               {
                   url: 'insert.php',
                   type: 'POST',
                   data: record,
                   success:function (data){
                       alert(data);
                   }
               }
           );
           }
       );
    });

    </script>

</head>

<body>
<form>
    <label for="title">Title</label>
    <input type="text" id="title" name="title"><br/>
    <label for="title">Text</label>
    <textarea name="text" id="text" cols="30" rows="10"></textarea><br/>
    <button type="button" id="button" name="Send">Send</button>
</form>

</body>
</html>

