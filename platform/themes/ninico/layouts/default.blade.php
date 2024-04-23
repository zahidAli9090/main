@extends(Theme::getThemeNamespace('layouts.base'))

@section('content')
    {!! Theme::partial('default-header') !!}

    <main>
        {!! Theme::partial('breadcrumb') !!}
        <div class="pt-80 pb-80">
            <div class="container">
                {!! Theme::content() !!}
            </div>
        </div>
    </main>

    {!! Theme::partial('footer') !!}
@endsection
