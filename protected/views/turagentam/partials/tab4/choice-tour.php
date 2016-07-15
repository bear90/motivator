<form class="form choice-tour">
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
        <input type="text" class="form-control" name="price">
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-default">ВЫПОЛНИТЬ  РАСЧЁТ</button>
    </div>
</form>
<div id="choice-calculation"><!-- --></div>