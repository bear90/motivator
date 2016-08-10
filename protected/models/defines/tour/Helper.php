<?php

namespace application\models\defines\tour;

use application\models\Tour;
use application\models\TourCity;

class Helper {

    public function create(array $data)
    {
        // Create Tour
        $tour = new Tour();
        $tour->attributes = $data;
        $tour->touristId = \Yii::app()->user->model->tourist->id;
        $tour->save();

        if($tour->hasErrors()){
            throw new \Exception(\Tool::errorToString($tour->errors));
        }

        // Create Cities
        foreach ($data['city'] as $name) {
            $name = trim($name);
            if(empty($name))
            {
                continue;
            }
            $city = new TourCity();
            $city->city = $name;
            $city->tourId = $tour->id;
            $city->save();

            if($city->hasErrors()){
                throw new \Exception(\Tool::errorToString($city->errors));
            }
        }

        return $tour;
    }

    public function update($id, array $data)
    {
        // Update Tour
        $tour = Tour::model()->findByPk($id);
        $tour->attributes = $data;
        $tour->save();

        if($tour->hasErrors()){
            throw new \Exception(\Tool::errorToString($tour->errors));
        }

        return $tour;
    }

    public function delete($id)
    {
        $tour = Tour::model()->findByPk($id);
        if($tour)
        {
            $tour->delete();
        }

        return true;
    }

    public function setManager($id, $managerId)
    {
        $tour = Tour::model()->findByPk($id);
        if ($tour && !$tour->managerId)
        {
            $tour->managerId = $managerId;
            $tour->save();

            if($tour->hasErrors()){
                throw new \Exception(\Tool::errorToString($tour->errors));
            }
        }

        return $tour;
    }
}