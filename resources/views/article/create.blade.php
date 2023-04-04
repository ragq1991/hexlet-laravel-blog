@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (Session::has('flash_message'))
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="alert alert-success">
                {{Session::get('flash_message')}}
            </div>
        </div>
    </div>
</div>
@endif

{{ Form::model($article, ['route' => 'articles.store']) }}
    {{ Form::label('name', 'Название') }}
    {{ Form::text('name') }}<br>
    {{ Form::label('body', 'Содержание') }}
    {{ Form::textarea('body') }}<br>
    {{ Form::submit('Создать') }}
{{ Form::close() }}
