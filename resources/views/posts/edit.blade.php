@extends('main')

@section('title', ' | Edit Post')

@section('stylesheets')
    {!! Html::style('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css') !!}

    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=5s0y8rloo5to7iabxx06kr27x6df5xrh1gaj3na1yfx3dntj"></script>

    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'link code',
            menubar: false
        });
    </script>

@endsection

@section('content')

    <div class="row">
        {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT']) !!}
        <div class="col-md-8">
            {{ Form::label('title', 'Title:') }}
            {{ Form::text('title', null, ['class' => 'form-control input-lg']) }}

            {{ Form::label('slug', 'Slug:', ['class' => 'form-spacing-top']) }}
            {{ Form::text('slug', null, ['class' => 'form-control']) }}

            {{ Form::label('category_id', 'Category:', ['class' => 'form-spacing-top']) }}
            {{ Form::select('category_id', $map, null, ['class' => 'form-control']) }}

            {{ Form::label('tags', 'Tags:') }}
            <select name="tags[]" class="form-control select2-multi" multiple="multiple">
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            </select>

            {{ Form::label('body', 'Body:', ['class' => 'form-spacing-top']) }}
            {{ Form::textarea('body', null, ['class' => 'form-control']) }}
        </div>

        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <dt>Created At:</dt>
                    <dd>{{ date('M-d-Y, H:i', strtotime($post->created_at)) }}</dd>
                </dl>

                <dl class="dl-horizontal">
                    <dt>Last Updated:</dt>
                    <dd>{{ date('M-d-Y, H:i', strtotime($post->updated_at)) }}</dd>
                </dl>

                <hr>

                <div class="row">
                    <div class="col-sm-6">
                        {!! Html::linkRoute('posts.show', 'Cancel', array($post->id), ['class' => 'btn btn-danger btn-block']) !!}
                        {{--<a href="#" class="btn btn-primary btn-block">--}}
                        {{--Edit--}}
                        {{--</a>--}}
                    </div>

                    <div class="col-sm-6">
                        {{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}
                        {{--<a href="#" class="btn btn-danger btn-block">--}}
                        {{--Delete--}}
                        {{--</a>--}}
                    </div>
                </div>

            </div>
        </div>
        {!! Form::close() !!}
    </div>

@endsection

@section('scripts')
    {!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js') !!}
    <script type="text/javascript">

        $('.select2-multi').select2();

        $('.select2-multi').select2().val({!! json_encode($post->tags()->getRelatedIds()) !!}).trigger('change');

    </script>
@endsection