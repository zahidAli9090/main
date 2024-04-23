<div class="form-group">
    <label for="widget-icon">{{ __('Icon') }}</label>
    <input type="text" id="widget-icon" class="form-control" name="icon" value="{{ Arr::get($config, 'icon') }}">
</div>

<div class="form-group">
    <label for="widget-phone">{{ __('Phone number') }}</label>
    <input type="text" id="widget-phone" class="form-control" name="phone" value="{{ Arr::get($config, 'phone') }}">
</div>

<div class="form-group">
    <label for="widget-text">{{ __('Text') }}</label>
    <input type="text" id="widget-text" class="form-control" name="text" value="{{ Arr::get($config, 'text') }}">
</div>
