<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <table style="width:75%">
            <tr>
                <th align="center">Name</th>
                <th align="center" colspan="4">Action</th>
            </tr>
            @foreach($result['calllists'] as $key=>$calllist)
                <tr>
                    <td align="center">{{$calllist->name}}</a></td>
                    <td align="center"><button><a href="/processTop/{{$calllist->clid}}/{{$calllist->id}}">Top</button></td>
                    <td align="center"><button><a href="/processUp/{{$calllist->clid}}/{{$calllist->id}}/{{$calllist->level}}">Up</button></td>
                    <td align="center"><button><a href="/processDown/{{$calllist->clid}}/{{$calllist->id}}/{{$calllist->level}}">Down</button></td>
                    <td align="center"><button><a href="/processBottom/{{$calllist->clid}}/{{$calllist->id}}">Bottom</button></td>
                </tr>
            @endforeach
        </table>
    </body>
</html>
