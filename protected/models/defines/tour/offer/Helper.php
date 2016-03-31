<?php

namespace application\models\defines\tour\offer;

use application\models\TourOffer;

class Helper {

    public function create(array $data)
    {
        // Create TourOffer
        $model = new TourOffer();
        $model->attributes = $data;
        $model->save();

        if($model->hasErrors()){
            throw new \Exception(\Tool::errorToString($model->errors));
        }

        return $model;
    }

    public function update($id, array $data)
    {
        // Update TourOffer
        $model = TourOffer::model()->findByPk($id);
        $model->attributes = $data;
        $model->save();

        if($model->hasErrors()){
            throw new \Exception(\Tool::errorToString($model->errors));
        }

        return $model;
    }

    public function delete($id)
    {
        $model = TourOffer::model()->findByPk($id);
        if($model)
        {
            $model->delete();
        }

        return true;
    }
}