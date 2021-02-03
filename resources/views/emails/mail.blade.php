<!DOCTYPE html>
<html>
<head>
    <title>euro-radar.maxximo-software.de</title>
    <style>
        .container{
            width: 600px;
        }
        .table{
            width: 600px;
            text-align: center;
            font-size: 21px;
        }<!DOCTYPE html>
<html>
<head>
    <title>euro-radar.maxximo-software.de</title>
    <style>
        .container{
            width: 600px;
        }
        .table{
            width: 600px;
            text-align: center;
            font-size: 21px;
        }
    </style>
</head>
<body>
    <center>
        <h2>Sehr geehrter {{$details['firstname']}} {{$details['lastname']}}</h2>
		 <p>es liegt ein neuer Auftrag f端r Sie vor: </p>
        <div  class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th>
                            item
                        </th>
                        <td>
                            value
                        </td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                           Google address
                        </td>
                        <td>
                            {{ $details['google'] }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                           Zip code
                        </td>
                        <td>
                            {{ $details['zip_code'] }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                           UZ
                        </td>
                        <td>
                            {{ $details['city_name'] }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                           Number
                        </td>
                        <td>
                            {{ $details['car_number'] }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                           Color
                        </td>
                        <td>
                            {{ $details['car_color'] }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                           Brand
                        </td>
                        <td>
                            {{ $details['car_brand'] }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Underground car park
                        </td>
                        <td>
                            {{ $details['carpark'] }}
                        </td>
                    </tr>
        
                    
                </tbody>
            </table><br>
        </div>
    <div class="container"><a style="font-size: 33px;
        border: 2px solid;
        /* width: 294px; */
        padding: 2px 10px;
        background: #c0ff00;
        border-color: #9c8c8c;"href="http://euro-radar.maxximo-software.de/accept/{{$details['order_id']}}">Accept</a></div>        
    </center>
    
</body>
</html>
   