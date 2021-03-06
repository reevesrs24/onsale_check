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
    <body style="overflow:auto">
        
    
        <div class="container flex-center position-ref full-height">
            <div class="content col-lg-6">
                <div id="vue-div">
                    <template v-if="showOnsaleCheck">
                        <table class="table table-sm table-hover">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Time</th>
                            </tr>
                          </thead>
                          <tbody>
                            @for ($i = 0; $i < sizeof($times); $i++)
                              <tr scope="row">
                                <th>{{ $i + 1 }}</th>
                                <td style="cursor: pointer" id={{ strval($times[$i]->time) }}><a href=/onsale-events/{{strval($times[$i]->time)}}>{{ date('Y-m-d H:i:s', strval($times[$i]->time)) }}</a></td>
                              </tr>  
                            @endfor
                          </tbody>
                        </table>
                    </template>
                    <template v-if="!showOnsaleCheck">
                        <table class="table table-sm table-hover">
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
                          <tbody v-on:click="toggleTable">
                            <div style="overflow-y:scroll;">
                              <tr scope="row" v-for="event in events">
                                <th></th>
                                <td style="cursor: pointer">@{{ event.system }}</td>
                                <td style="cursor: pointer">@{{ event.event_code }}</td>
                                <td style="cursor: pointer">@{{ event.act_name }}</td>
                                <td style="cursor: pointer">@{{ event.venue_name }}</td>
                                <td style="cursor: pointer">@{{ event.onsale_type }}</td>
                                <td style="cursor: pointer">@{{ event.event_id }}</td>
                                <td style="cursor: pointer">@{{ event.time }}</td>
                              </tr>
                            </div>
                          </tbody>
                        </table>
                    </template>
                </div>
            </div>
        </div>
        <!-- Scripts -->
        <script type="text/javascript" src="{{URL::asset('js/bootstrap.min.js')}}"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.27/vue.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script>
            var app = function() {

                var self = {};

                self.toggleTable = function() {
                    self.vue.showOnsaleCheck = !self.vue.showOnsaleCheck;
                };

                self.getEvents = function() {
                    self.vue.showOnsaleCheck = !self.vue.showOnsaleCheck;
                        $.ajax({
                            type: "POST",
                            url: "http://homestead.app/api/getOnsaleCheckData",
                            data: {"time": "1505327979"},
                            dataType: 'json',
                            success: function (json) {
                                self.vue.events = json
                                console.log(self.vue.events)
                            }
                        });
                    };

                self.vue = new Vue({
                    el: "#vue-div",
                    delimiters: ['${', '}'],
                    unsafeDelimiters: ['!{', '}'],
                    data: {
                        counter: 0,
                        showOnsaleCheck: true,
                        events: []
                    },
                    methods: {
                        toggleTable: self.toggleTable,
                        getEvents: self.getEvents
                    }
                });
                return self;
            };
            
            var APP = null;

            // This will make everything accessible from the js console;
            // for instance, self.x above would be accessible as APP.x
            jQuery(function(){APP = app();});
        </script>
    </body>
</html>
