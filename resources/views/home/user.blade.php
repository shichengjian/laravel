<link rel="stylesheet" type="text/css" href="../../css/app.css">
<body>
    <!-- 引入视图 -->
    @include('common.top')
    <div class="">
    <!-- 继承视图 -->
    @extends('common.parent')
    @section('content')
        <p>This is my body content.</p>
    @endsection
    </div>
</body>
