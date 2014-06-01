<?php

class SiteController extends Controller
{

    const SHORT_LINK_LENGTH = 6;
    const SHORT_LINK_SYMBOLS = 'ABCDEFGHJKLMNOPQRSTUVWXYZabcdefghjklmnopqrstuvwxyz1234567890';


    public function actionIndex()
    {
        $model = new Link();
        if ($values = Yii::app()->request->getPost('Link')) {
            $model->attributes = $values;
            $model->short_link = $model->full_link ? $this->getNewLinkName() : '';
            if ($model->validate()) {
                $model->save();
            }
        }
        if (Yii::app()->request->isAjaxRequest) {
            echo CJSON::encode(array(
                'shortLink' => $model->short_link,
                'errors' => implode('. ', $model->getErrors('full_link')),
            ));
            Yii::app()->end();
        } else {
            $this->render('index', array(
                'model' => $model,
            ));
        }
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError()
    {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest) {
                echo $error['message'];
            } else {
                $this->render('error', $error);
            }
        }
    }

    /**
     * Try to redirect by short link
     */
    public function actionLink($link)
    {
        if (!$link = Link::model()->find('short_link=:shortLink', array(':shortLink' => $link))) {
            throw new CHttpException(404, 'Ссылки не существует');
        }
        $this->redirect($link->full_link);
    }

    public function getNewLinkName() {
        $chars = self::SHORT_LINK_SYMBOLS;
        $chars_length = (strlen($chars) - 1);

        do {
            for ($link = '', $i = 0; $i < self::SHORT_LINK_LENGTH; $i++)  {
                $link .=  $chars{rand(0, $chars_length)};
            }
        } while (Link::model()->find('short_link=:shortLink', array(':shortLink' => $link)));

        return $link;
    }
}