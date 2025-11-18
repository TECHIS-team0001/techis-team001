@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('スタッフ一覧') }}</div>

                <div class="card-body">
                    <a href="{{ route('staff.create') }}" class="btn btn-primary mb-3">スタッフ登録</a>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>名前</th>
                                <th>メールアドレス</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($staffs as $staff)
                                <tr>
                                    <td>{{ $staff->id }}</td>
                                    <td>{{ $staff->name }}</td>
                                    <td>{{ $staff->email }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
