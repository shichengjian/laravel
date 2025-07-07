<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <title>Document</title>
</head>
<body>
    <input type="button" value="pick it!" id="btn"/>
    <script type="text/javascript">
        $(function(){
            $('#btn').click(function(){
                $.get('/admin/admin/ajax',function(data){
                    console.log(data);
                },'json');
            });
        });
    </script>
</body>
</html>