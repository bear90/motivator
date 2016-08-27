<form class="form ask-question">
    <input type="hidden" name="emailTo" value="<?php echo $email; ?>">
    <div class="alert hidden" role="alert"></div>
    <div class="form-group">
        <label class="control-label">Текст письма:</label>
        <textarea class="form-control" rows="3" name="text"></textarea>
    </div>
    <div class="form-group">
        <label class="control-label" for="attachedFile">Файл</label>
        <input type="file" id="attachedFile" name="file">
        <p class="help-block">Прикрепите файл если необходимо</p>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-default">Отправить</button>
    </div>
</form>