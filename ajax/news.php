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
            var ids = [];

            setInterval(function (){
                getNews();
            },1000);

            function getNews() {
                $.ajax(
                    {
                    url: 'insert.php',
                    type: 'POST',
                    success: function (data) {
                        data = jQuery.parseJSON(data);
                            $.each(data, function (i, item){
                                if(jQuery.inArray(item.id, ids) == -1) {
                                    ids.push(item.id);
                                    $("#container").append("<h1>" + item.title + "</h1><p>" + item.text + "</p>");
                                }
                            });
                        }
                    }
                );
            }
        });

    </script>

</head>

<body>
<form>
    <div id="container"></div>
</form>

</body>
</html>