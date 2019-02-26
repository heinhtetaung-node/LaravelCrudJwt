@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">お問い合わせ</div>
                @if($result['success'] == true)
                <div class="card-body">
                    <div class="alert alert-success">
                    	登録しました
                   	</div>
                </div>
                @endif

                @if($result['success'] == false)
                <div class="card-body">
                    <div class="alert alert-danger">
                    	{{ $result['error'] }}
                   	</div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
