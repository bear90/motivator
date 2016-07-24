<form class="form change-tour">
    <div class="form-group">
        <label class="control-label">Личный кабинет абонента №:</label>
        <input type="text" class="form-control" name="touristId">
    </div>
    <div class="form-group">
        <label class="control-label">Начало тура:</label>
        <input type="text" class="form-control calendar" name="startDate" autocomplete="off">
    </div>
    <div class="form-group">
        <label class="control-label">Окончание тура:</label>
        <input type="text" class="form-control calendar" name="endDate" autocomplete="off">
    </div>
    <div class="form-group">
        <label class="control-label">Исходная стоимость тура:</label>
        <input type="text" class="form-control" name="price" value=".00">
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-default">ВЫПОЛНИТЬ  РАСЧЁТ</button>
        <a href="#" class="more hidden">подробнее</a>
        <button type="reset" class="btn btn-default fl-r">ОЧИСТИТЬ</button>
    </div>
</form>
<div id="change-calculation"><!-- --></div>