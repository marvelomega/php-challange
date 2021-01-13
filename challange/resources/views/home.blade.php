@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!--<div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>-->
        <div class="col-md-12">
            <h1>People</h1>

            <h4>Insert XML</h4>
            <form method="post" action="{{ action('HomeController@xmlPerson') }}"  enctype="multipart/form-data">
                @csrf
                <input type="file" name="xml[]" accept=".xml" multiple>
                <button class="btn btn-success">Send</button>
            </form>
            <br>
            <table class="table">
                <thead>
                    <th>id</th>
                    <th>PersonId</th>
                    <th>PersonName</th>
                    <th>Phones</th>
                </thead>
                <tbody>
                    @foreach( $person as $p)
                        <tr>
                            <td>{{$p->id}}</td>
                            <td>{{$p->personid}}</td>
                            <td>{{$p->personname}}</td>
                            <td>
                            @forelse($p->phone as $ph)
                                {{$ph->phone}}<br>
                            @empty
                            @endforelse
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
