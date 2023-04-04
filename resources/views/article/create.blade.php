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
    @include('article.form')
    {{ Form::submit('Сохранить') }}
{{ Form::close() }}
