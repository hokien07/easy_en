@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add a word') }}</div>
                <div class="card-body">
                    <form action="{{route('store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="word">Word</label>
                            <input type="text" class="form-control" name="word" id="word" placeholder="Enter word">
                        </div>

                        <div class="form-group">
                            <label for="word">Eng description</label>
                            <textarea rows="5" class="form-control" name="en_des" id="en_des" placeholder="Enter English description"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="word">VN description</label>
                            <textarea rows="5" class="form-control" name="vn_des" id="vn_des" placeholder="Enter Vietnamese description"></textarea>
                        </div>

                        <div class="form-group">
                            <input type="submit" value="Save" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
