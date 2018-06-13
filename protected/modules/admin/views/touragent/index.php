<?php
    use application\models\Entity\Touragent;
    use application\models\entities\Configuration;
?>
<h2>Турагенты:</h2>

<?php if($message): ?>
    <div class="alert alert-success" role="alert"><?php echo $message; ?></div>
<?php endif; ?>

<div class="row" style="height: 50px">
    <div class="col-md-6">
        <?php echo $form->renderBegin(); ?>
            <div class="form-group">
                <?php echo $form['name']; ?>
            </div>

            <button type="submit" class="btn btn-default">Найти</button>
            <button type="button" class="btn btn-default reset">Очистить</button>
        <?php echo $form->renderEnd(); ?>
    </div>  
</div>

<table class="table table-bordered">
    <tr>
        <th>Название</th>
        <th width="20">Операции</th>
    </tr>
    <?php foreach((array) $touragents as $touragent): ?>
        
        <?php 
            $model = new Touragent($touragent);
            $filterForm->getModel()->touragentId = $touragent->id; 
        ?>

        <tr>
            <td>
                <p><?php echo $touragent->name; ?></p>
                <p><a href="<?php echo $model->getLink(); ?>"><?php echo $touragent->site; ?></a></p>
                <p><?php echo $touragent->user->password; ?></p>
                

                <p><a href="#" class="more">Количество размещённых предложений</a></p>

                <div class="desc hidden">
                    <?php echo $filterForm->renderBegin(); ?>
                        <?php echo $filterForm['touragentId']; ?> 

                        <p>Всего: <?php echo Touragent\Repository::total($touragent->id); ?></p>
                        <p>
                            <div class="form-group">
                                За период 
                            </div>
                            <div class="form-group">
                                <?php echo $filterForm['from']; ?> 
                            </div>

                            <div class="form-group">
                                <?php echo $filterForm['to']; ?>
                            </div>
                            
                            <button type="button" class="btn btn-default find">Показать</button>
                            <button type="button" class="btn btn-default reset">Очистить</button>
                        </p>

                        <p class="ajax"><!-- --></p>

                    <?php echo $filterForm->renderEnd(); ?>
                </div>
            </td>
            <td>
                
                <a href="<?php echo Yii::app()->createUrl("/admin/touragent/{$touragent->id}")?>"
                    type="button" class="btn btn-default btn-xs">
                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Редактировать
                </a>

                <a href="<?php echo Yii::app()->createUrl("admin/touragent/edit/{$touragent->id}"); ?>?action=<?php echo $touragent->status == 1 ? 'deactivate' : 'activate'?>"
                    type="button" class="btn btn-default btn-xs">
                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> 
                    <?php echo $touragent->status==1 ? 'Заблокировать' : 'Разблокировать'; ?>
                </a>

                <a href="<?php echo Yii::app()->createUrl("/admin/touragent/delete/{$touragent->id}")?>" 
                    type="button" class="btn btn-danger btn-xs">
                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Удалить
                </a>

                <a href="<?php echo Yii::app()->createUrl("/admin/touragent/reset/{$touragent->id}")?>" 
                    type="button" class="btn btn-danger btn-xs">
                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Обнулить статистику
                </a>

            </td>
        </tr>
    <?php endforeach; ?>
</table>

<a href="<?php echo Yii::app()->createUrl("/admin/touragent/add/")?>" type="button" class="btn btn-default">
    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Добавить
</a>
