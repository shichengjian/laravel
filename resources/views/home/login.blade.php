<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORM</title>
</head>
<body>
    <form action="/admin/admin/store" method="post" enctype="multipart/form-data">
        @csrf
        username：<input type="text" name="username" placeholder="请输入中文名">
        password:<input type="text" name="password" placeholder="请输入password">
        email:<input type="text" name="email" placeholder="请输入email">

        <!-- 验证 -->
        <img src="{{ captcha_src() }}" alt="captcha">
        <input 
            type="text" name="captcha" class="form-control @error('captcha') is-invalid @enderror" placeholder="Please Insert Captch"
        >

        <!-- file:<input type="file" name="photos"> -->
        <input type="submit" value="提交">
    </form>
    <!-- <table border="1">
        @foreach ($data as $values)
        <tr>
            @foreach ($values as $value)
            <td>
                {{ $value }}
            </td>
            @endforeach
        </tr>
        @endforeach
    </table> -->

    
    <!-- 上传文件时显示错误提示信息 -->
    @if(count($errors)>0)
        @foreach($errors->all() as $error)
            {{ $error }}
        @endforeach
    @endif
</body>
</html>