@extends(Theme::getThemeNamespace('layouts.base'))

@section('content')
    {!! Theme::partial('collapse-header') !!}

    <main>
        {!! Theme::content() !!}
    </main>

    {!! Theme::partial('footer') !!}
@endsection
