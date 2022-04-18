@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="clearfix">
                <a href="{{route('add')}}" class="btn btn-primary">Add new</a>
            </div>


            <div class="card mt-3">
                <div class="card-header">{{ __('Words') }}</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Word</th>
                                <th scope="col">Eng Description</th>
                                <th scope="col">VN Description</th>
                                <th scope="col">Count</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($words as $index => $word)
                            <tr>
                                <th scope="row">{{++$index}}</th>
                                <td>{{$word->word}}</td>
                                <td>{{$word->en_des}}</td>
                                <td>{{$word->vn_des}}</td>
                                <td>{{$word->count}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {!! $words->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
