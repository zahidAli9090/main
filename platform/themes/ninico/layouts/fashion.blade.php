@extends(Theme::getThemeNamespace('layouts.base'))

@section('content')
    {!! Theme::partial('default-header') !!}

    <main>
        {!! Theme::content() !!}
    </main>

    {!! Theme::partial('footer') !!}
@endsection
