<div class="account__input">
    <label for="211">Новый пароль</label>
    <input class="input textarea" type="password" id="211" name="password">
</div>
<div class="account__input">
    <label for="212">Повтор пароля</label>
    <input class="input textarea" type="password" id="212" name="password_confirmation">
    @error('password')
        <span class="upload-error">{{ $errors->first('password') }}</span>
    @enderror
</div>
