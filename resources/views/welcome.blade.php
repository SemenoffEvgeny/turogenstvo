<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.1.4/css/uikit.min.css" />

        <!-- UIkit JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.1.4/js/uikit.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.1.4/js/uikit-icons.min.js"></script>
        <script src="{{asset('js/jquery.min.js')}}"></script>
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }
            .uk-label{
                display: block;

                margin: 10px;
            }
            form{
                 width: 300px;
             }
            .uk-input{
                width: 60%;
                margin-left: 10px;
            }

            .uk-select{
                width: 200px;
                margin-left: 20px;
            }
            .uk-number{
                padding: 10px;
                width: 50px;
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
                font-size: 13px;
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
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Оформите ваш заказ
                </div>

                <form method="post" action="{{ action('OrderController@create') }}" class="uk-form" action="post" id="form-order">
                    <label class="uk-label" for="country" id="country-label">
                        Выберите страну:
                        <select class="uk-select" name="country" id="country">
                            @if($countries!=NULL)
                                @foreach($countries as $country)
                                    <option value="{{$country->country}}">{{$country->country}}</option>
                                @endforeach

                            @endif
                        </select>

                    </label>
                    <label id="city-label" class="uk-label uk-hidden" for="city">Выберите город:
                        <select class="uk-select" name="city" id="city"></select>
                    </label>
                    <label id="cost-label" class="uk-label uk-hidden" for="cost">Цена для одной персоны:
                        <input type="text" name="cost" class="uk-input" id="cost" >
                    </label>
                    <label id="quantity-label" class="uk-label uk-hidden" for="cost">Укажите количество людей:
                        <input type="number" min="1" name="quantity" class="uk-number" id="quantity" >
                    </label>
                    <label id="total-label" class="uk-label uk-hidden" for="total">Итого:
                        <input type="text" name="total" class="uk-input" id="total" >
                    </label>
                    <label id="fio-label" class="uk-label uk-hidden" for="fio">Введите Ваше ФИО:
                        <input type="text" name="fio" class="uk-input" id="fio" placeholder="Ваше фио ..." required>
                    </label>
                    <label id="phone-label" class="uk-label uk-hidden" for="phone">Введите свой телефон:
                        <input type="text" name="phone" class="uk-input" id="phone" required>
                    </label>
                    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                    <button class="uk-button uk-button-default uk-hidden" id="submit">Отправить заявку</button>
                </form>
                
            </div>
        </div>
    </body>
    <script type="text/javascript">
        $( document ).ready(function() {
            $('#country').append(
                '<option id=\'c1\' selected=\'selected\' value=\' \'>-Не указано </option>'
            );

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var ajaxData;
            $('#country').change(function (e) {
                e.preventDefault();
                $('#c1').remove();
                var country = $('#country').val();
                var $city = $('#city');

                $.post({

                    url:'/public/ajaxCity',

                    data:{country:country},

                    success:function(data){
                        $('#city-label').removeClass('uk-hidden');
                        $('#quantity-label').removeClass('uk-hidden');
                        $city.children().remove();
                        $('#city').append(
                            '<option id=\'c2\'selected=\'selected\' value=\' \'>-Не указано </option>'
                        );
                        $.each(data, function (index, value) {
                            var elem = $('#city').append(
                                '<option id='+ index +' value='+ value.city +'>'+ value.city +'</option>'
                            );

                        });

                    },
                    error: function () {
                        alert('Whoops');
                    }
                });
            });


            $('#city').on('change', function (e) {
                e.preventDefault();

                $('#cost-label').removeClass('uk-hidden');
                $('#total-label').removeClass('uk-hidden');
                $('#fio-label').removeClass('uk-hidden');
                $('#phone-label').removeClass('uk-hidden');
                $.post({

                    url:'/public/ajaxCost',

                    data:{city: $('#city').val()},

                    success:function(data){

                        var index = Object.keys(data)[0];
                        $('#cost').val(data[index].cost);
                    },
                    error: function () {
                        alert('Whoops');
                    }
                });
                //$('#c2').remove();
                // var val =  $('#city').val();
                // var cost = ajaxData[val].cost;
                // $('#cost').val(cost);

            });
            $('#quantity').change(function (e) {
                e.preventDefault();
                var $cost = $('#cost').val();
                var $quantity = $('#quantity').val();
                $('#total').val($cost * $quantity + '.00');
                $('#submit').removeClass('uk-hidden');
            });
        });

    </script>
</html>
