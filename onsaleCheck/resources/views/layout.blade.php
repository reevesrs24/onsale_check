<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Onsale Check Dashboard</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
       <link href="{{ URL::asset('css/bootstrap.css') }}" rel="stylesheet">

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

            .table td {
                text-align: left;   
            }
        </style>
    </head>
    <body>
        <div class="container flex-center position-ref full-height">
            <div class="content col-lg-12">
                <div>
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>System</th>
                          <th>Event Code</th>
                          <th>Act Name</th>
                          <th>Venue Name</th>
                          <th>Onsale Type</th>
                          <th>Event ID</th>
                          <th>Time</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td>Mark</td>
                          <td>Otto</td>
                          <td>@mdo</td>
                          <td>Mark</td>
                          <td>Otto</td>
                          <td>@mdo</td>
                          <td>Otto</td>
                        </tr>
                        <tr>
                          <th scope="row">2</th>
                          <td>Jaco</td>
                          <td>Thornton</td>
                          <td>@fat</td>
                          <td>Mark</td>
                          <td>Otto</td>
                          <td>@mdo</td>
                          <td>Otto</td>
                        </tr>
                        <tr>
                          <th scope="row">3</th>
                          <td >Larry the Bird</td>
                          <td>@twitter</td>
                          <td>Mark</td>
                          <td>Otto</td>
                          <td>@mdo</td>
                          <td>Otto</td>
                          <td>Otto</td>
                        </tr>
                      </tbody>
                    </table>
                </div>
            </div>
            @yield('dashboard')
        </div>
        <!-- Scripts -->
        <script type="text/javascript" src="{{URL::asset('js/bootstrap.min.js')}}"></script>
    </body>
</html>