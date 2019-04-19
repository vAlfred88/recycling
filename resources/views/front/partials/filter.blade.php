<form class="filret clearfix shadow-element">
    <div class="filret__select-box">
        <select class="region">
            <option value="Saint-Petersburg">Москва</option>
            <option value="Moscow">Санкт-Петербург</option>
            <option value="Yekaterinburg">Екатеринбург</option>
            <option value="Yekaterinburg">Петропавловск-Камчатский</option>
            <option value="Krasnoyarsk">Красноярск</option>
        </select>
    </div>
    <div class="filret__checkbox-box">
        @foreach($services as $service)
            <label class="checkbox-btn">
                <input type="checkbox" value="{{ $service->id }}">
                <span>{{ $service->name }}</span>
            </label>
        @endforeach
        <div class="search-box clearfix rL">
            <input type="button" class="search-btn" value="Поиск">
            <div class="rL hid">
                <input type="text" name="search" class="search-fild">
            </div>
        </div>
    </div>
</form>
