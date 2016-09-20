<form class="form choice-tour">
    <div class="row form-group">
        <label class="col-md-8 control-label">Начало тура:</label>
        <div class="col-md-4">
            <input type="text" class="form-control calendar" name="startDate" autocomplete="off">
        </div>
    </div>
    <div class="row form-group">
        <label class="col-md-8 control-label">Окончание тура:</label>
        <div class="col-md-4">
            <input type="text" class="form-control calendar" name="endDate" autocomplete="off">
        </div>
    </div>
    <div class="row form-group">
        <label class="col-md-8 control-label">Исходная стоимость тура:</label>
        <div class="col-md-4">
            <input type="text" class="form-control" name="price" value=".00">
        </div>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-default">ВЫПОЛНИТЬ  РАСЧЁТ</button>
        <button type="reset" class="btn btn-default fl-r">ОЧИСТИТЬ</button>
    </div>
</form>
<div id="choice-calculation"><!-- --></div>