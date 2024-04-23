<div class="form-group">
    <label class="control-label">{{ __('Style') }}</label>
    {{ Form::customSelect('style', ['wooden' => __('Wooden'), 'fashion' => __('Fashion')], Arr::get($attributes, 'style')) }}
</div>

<div class="form-group">
    <label class="control-label">{{ __('Title') }}</label>
    <input type="text" name="title" value="{{ Arr::get($attributes, 'title') }}" class="form-control" placeholder="{{ __('Title') }}">
</div>

<div class="form-group">
    <label class="control-label">{{ __('Limit') }}</label>
    <input type="number" name="limit" value="{{ Arr::get($attributes, 'limit') }}" class="form-control" placeholder="{{ __('Number of categories to display') }}">
</div>
