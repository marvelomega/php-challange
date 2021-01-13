@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1>Ship Orders</h1>

                <h4>Insert XML</h4>
                <form method="post" action="{{ action('ShipOrderController@upload') }}"  enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="xml[]" accept=".xml" multiple>
                    <button class="btn btn-success">Send</button>
                </form>
                <br>
                <table class="table">
                    <thead>
                    <th>id</th>
                    <th>orderId</th>
                    <th>Person Name</th>
                    <th>Ship To (Address)</th>
                    <th>Ship Items </th>
                    </thead>
                    <tbody>
                        @forelse($order as $o)
                            <tr>
                                <td>{{$o->id}}</td>
                                <td>{{$o->orderid}}</td>
                                <td>{{$o->person->personname}}</td>
                                <td>
                                    {{$o->shipto['name']}},
                                    {{$o->shipto['address']}},
                                    {{$o->shipto['city']}},
                                    {{$o->shipto['country']}}
                                </td>
                                <td>
                                @forelse($o->shipitem as $oo)
                                        Title: {{$oo->title}}<br>
                                        Note: {{$oo->note}}<br>
                                        Quantity: {{$oo->quantity}}<br>
                                        Price: {{$oo->price}}<br><hr>
                                @empty
                                @endforelse
                                </td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
