<div class="form-group">
    <label for="widget-description">{{ __('Description') }}</label>
    <textarea name="description" id="widget-description" class="form-control" rows="3">{{ Arr::get($config, 'description') }}</textarea>
</div>

<div class="mb-3">
    <label class="form-label">{{ __('Logo') }}</label>
    {{ Form::mediaImage('logo', $config['logo']) }}
</div>
