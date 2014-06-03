<?php

//class TimeValue
//{
//    public $
//}

class EthController extends Controller
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout='//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions'=>array('index'),
                'users'=>array('*'),
            ),
            array('allow',  // deny all users
                'users'=>array('*'),
            ),
        );
    }


    /**
     * Lists all models.
     */
    public function actionTotal()
    {
        $dataProvider = new CSqlDataProvider($this->makeQueryStr(), array('pagination'=>false));
        //var_dump($dataProvider->data);
        $dictArray = array();
        foreach($dataProvider->data as $item)
        {
            $key = $item['state'];
            if(!$this->hasDict($dictArray, $key))
            {
                $dict = array('key'=>$key,'values'=>array());
                //array_push($dict['values'], array(mktime(0,0,0,8,1,(int)$item['year']),(int)$item['total']));
                array_push($dict['values'], array((int)$item['year'],(int)$item['total']));
                array_push($dictArray,$dict);
            }
            else
            {
                foreach($dictArray as &$dict)
                {
                    if($dict['key'] == $key)
                    {
                        //array_push($dict['values'], array(mktime(0,0,0,8,1,(int)$item['year']),(int)$item['total']));
                        array_push($dict['values'], array((int)$item['year'],(int)$item['total']));
                        //break;
                    }
                }

                //$dict = &$this->findDict($dictArray, $key);
                //array_push($dict['values'], array(mktime(0,0,0,0,0,$item['year']),$item['total']));
            }
        }

        echo json_encode($dictArray);
    }

    public function actionFemale()
    {
        $dataProvider = new CSqlDataProvider($this->makeQueryStr(), array('pagination'=>false));
        //var_dump($dataProvider->data);
        $dictArray = array();
        foreach($dataProvider->data as $item)
        {
            $key = $item['state'];
            if(!$this->hasDict($dictArray, $key))
            {
                $dict = array('key'=>$key,'values'=>array());
                //array_push($dict['values'], array(mktime(0,0,0,8,1,(int)$item['year']),(int)$item['total']));
                array_push($dict['values'], array((int)$item['year'],(int)$item['female']));
                array_push($dictArray,$dict);
            }
            else
            {
                foreach($dictArray as &$dict)
                {
                    if($dict['key'] == $key)
                    {
                        //array_push($dict['values'], array(mktime(0,0,0,8,1,(int)$item['year']),(int)$item['total']));
                        array_push($dict['values'], array((int)$item['year'],(int)$item['female']));
                        //break;
                    }
                }

                //$dict = &$this->findDict($dictArray, $key);
                //array_push($dict['values'], array(mktime(0,0,0,0,0,$item['year']),$item['total']));
            }
        }

        echo json_encode($dictArray);
    }

    public function actionMale()
    {
        $dataProvider = new CSqlDataProvider($this->makeQueryStr(), array('pagination'=>false));
        //var_dump($dataProvider->data);
        $dictArray = array();
        foreach($dataProvider->data as $item)
        {
            $key = $item['state'];
            if(!$this->hasDict($dictArray, $key))
            {
                $dict = array('key'=>$key,'values'=>array());
                //array_push($dict['values'], array(mktime(0,0,0,8,1,(int)$item['year']),(int)$item['total']));
                array_push($dict['values'], array((int)$item['year'],(int)$item['male']));
                array_push($dictArray,$dict);
            }
            else
            {
                foreach($dictArray as &$dict)
                {
                    if($dict['key'] == $key)
                    {
                        //array_push($dict['values'], array(mktime(0,0,0,8,1,(int)$item['year']),(int)$item['total']));
                        array_push($dict['values'], array((int)$item['year'],(int)$item['male']));
                        //break;
                    }
                }

                //$dict = &$this->findDict($dictArray, $key);
                //array_push($dict['values'], array(mktime(0,0,0,0,0,$item['year']),$item['total']));
            }
        }

        echo json_encode($dictArray);
    }

    public function actionIndex()
    {
        /*		$dataProvider=new CActiveDataProvider('DustTypes');
                $this->render('index',array(
                    'dataProvider'=>$dataProvider,
                ));*/

        $dataProvider = new CSqlDataProvider($this->makeQueryStr(), array('pagination'=>false));
        //var_dump($dataProvider->data);
        $dictArray = array();

        foreach($dataProvider->data as $item)
        {

            $key = 'Caucasian Male';
            if(!$this->hasDict($dictArray, $key))
            {
                $dict = array('key'=>$key,'values'=>array());
                //array_push($dict['values'], array(mktime(0,0,0,8,1,(int)$item['year']),(int)$item['total']));
                array_push($dict['values'], array((int)$item['year'],(int)$item['caMale']));
                array_push($dictArray,$dict);
            }
            else
            {
                foreach($dictArray as &$dict)
                {
                    if($dict['key'] == $key)
                    {
                        //array_push($dict['values'], array(mktime(0,0,0,8,1,(int)$item['year']),(int)$item['total']));
                        array_push($dict['values'], array((int)$item['year'],(int)$item['caMale']));
                    }
                }
            }

            $key = 'Caucasian Female';
            if(!$this->hasDict($dictArray, $key))
            {
                $dict = array('key'=>$key,'values'=>array());
                //array_push($dict['values'], array(mktime(0,0,0,8,1,(int)$item['year']),(int)$item['total']));
                array_push($dict['values'], array((int)$item['year'],(int)$item['caFemale']));
                array_push($dictArray,$dict);
            }
            else
            {
                foreach($dictArray as &$dict)
                {
                    if($dict['key'] == $key)
                    {
                        //array_push($dict['values'], array(mktime(0,0,0,8,1,(int)$item['year']),(int)$item['total']));
                        array_push($dict['values'], array((int)$item['year'],(int)$item['caFemale']));

                    }
                }
            }


            $key = 'Black Male';
            if(!$this->hasDict($dictArray, $key))
            {
                $dict = array('key'=>$key,'values'=>array());
                array_push($dict['values'], array((int)$item['year'],(int)$item['blMale']));
                array_push($dictArray,$dict);
            }
            else
            {
                foreach($dictArray as &$dict)
                {
                    if($dict['key'] == $key)
                    {array_push($dict['values'], array((int)$item['year'],(int)$item['blMale']));
                    }
                }
            }

            $key = 'Black Female';
            if(!$this->hasDict($dictArray, $key))
            {
                $dict = array('key'=>$key,'values'=>array());
                array_push($dict['values'], array((int)$item['year'],(int)$item['blFemale']));
                array_push($dictArray,$dict);
            }
            else
            {
                foreach($dictArray as &$dict)
                {
                    if($dict['key'] == $key)
                    {array_push($dict['values'], array((int)$item['year'],(int)$item['blFemale']));
                    }
                }
            }

            $key = 'Native Male';
            if(!$this->hasDict($dictArray, $key))
            {
                $dict = array('key'=>$key,'values'=>array());
                array_push($dict['values'], array((int)$item['year'],(int)$item['naMale']));
                array_push($dictArray,$dict);
            }
            else
            {
                foreach($dictArray as &$dict)
                {
                    if($dict['key'] == $key)
                    {array_push($dict['values'], array((int)$item['year'],(int)$item['naMale']));
                    }
                }
            }

            $key = 'Native Female';
            if(!$this->hasDict($dictArray, $key))
            {
                $dict = array('key'=>$key,'values'=>array());
                array_push($dict['values'], array((int)$item['year'],(int)$item['naFemale']));
                array_push($dictArray,$dict);
            }
            else
            {
                foreach($dictArray as &$dict)
                {
                    if($dict['key'] == $key)
                    {array_push($dict['values'], array((int)$item['year'],(int)$item['naFemale']));
                    }
                }
            }

            $key = 'Asian Male';
            if(!$this->hasDict($dictArray, $key))
            {
                $dict = array('key'=>$key,'values'=>array());
                array_push($dict['values'], array((int)$item['year'],(int)$item['asMale']));
                array_push($dictArray,$dict);
            }
            else
            {
                foreach($dictArray as &$dict)
                {
                    if($dict['key'] == $key)
                    {array_push($dict['values'], array((int)$item['year'],(int)$item['asMale']));
                    }
                }
            }

            $key = 'Asian Female';
            if(!$this->hasDict($dictArray, $key))
            {
                $dict = array('key'=>$key,'values'=>array());
                array_push($dict['values'], array((int)$item['year'],(int)$item['asFemale']));
                array_push($dictArray,$dict);
            }
            else
            {
                foreach($dictArray as &$dict)
                {
                    if($dict['key'] == $key)
                    {array_push($dict['values'], array((int)$item['year'],(int)$item['asFemale']));
                    }
                }
            }

            $key = 'Hispanic Male';
            if(!$this->hasDict($dictArray, $key))
            {
                $dict = array('key'=>$key,'values'=>array());
                array_push($dict['values'], array((int)$item['year'],(int)$item['esMale']));
                array_push($dictArray,$dict);
            }
            else
            {
                foreach($dictArray as &$dict)
                {
                    if($dict['key'] == $key)
                    {array_push($dict['values'], array((int)$item['year'],(int)$item['esMale']));
                    }
                }
            }

            $key = 'Hispanic Female';
            if(!$this->hasDict($dictArray, $key))
            {
                $dict = array('key'=>$key,'values'=>array());
                array_push($dict['values'], array((int)$item['year'],(int)$item['esFemale']));
                array_push($dictArray,$dict);
            }
            else
            {
                foreach($dictArray as &$dict)
                {
                    if($dict['key'] == $key)
                    {array_push($dict['values'], array((int)$item['year'],(int)$item['esFemale']));
                    }
                }
            }

            $key = 'Alien Male';
            if(!$this->hasDict($dictArray, $key))
            {
                $dict = array('key'=>$key,'values'=>array());
                array_push($dict['values'], array((int)$item['year'],(int)$item['alMale']));
                array_push($dictArray,$dict);
            }
            else
            {
                foreach($dictArray as &$dict)
                {
                    if($dict['key'] == $key)
                    {array_push($dict['values'], array((int)$item['year'],(int)$item['alMale']));
                    }
                }
            }

            $key = 'Alien Female';
            if(!$this->hasDict($dictArray, $key))
            {
                $dict = array('key'=>$key,'values'=>array());
                array_push($dict['values'], array((int)$item['year'],(int)$item['alFemale']));
                array_push($dictArray,$dict);
            }
            else
            {
                foreach($dictArray as &$dict)
                {
                    if($dict['key'] == $key)
                    {array_push($dict['values'], array((int)$item['year'],(int)$item['alFemale']));
                    }
                }
            }

            $key = 'Unknown Male';
            if(!$this->hasDict($dictArray, $key))
            {
                $dict = array('key'=>$key,'values'=>array());
                array_push($dict['values'], array((int)$item['year'],(int)$item['unMale']));
                array_push($dictArray,$dict);
            }
            else
            {
                foreach($dictArray as &$dict)
                {
                    if($dict['key'] == $key)
                    {array_push($dict['values'], array((int)$item['year'],(int)$item['unMale']));
                    }
                }
            }

            $key = 'Unknown Female';
            if(!$this->hasDict($dictArray, $key))
            {
                $dict = array('key'=>$key,'values'=>array());
                array_push($dict['values'], array((int)$item['year'],(int)$item['unFemale']));
                array_push($dictArray,$dict);
            }
            else
            {
                foreach($dictArray as &$dict)
                {
                    if($dict['key'] == $key)
                    {array_push($dict['values'], array((int)$item['year'],(int)$item['unFemale']));
                    }
                }
            }

        }


        echo json_encode($dictArray);

    }

    public function actionData()
    {

    }

    public function hasDict($dictArray, $key)
    {
        foreach($dictArray as $dict)
        {
            if($dict['key'] == $key)
                return true;
        }
        return false;
    }


    public function actiontest()
    {
        echo $this->makeQueryStr();
    }

    /**
     * Returns a SQL statement based on $_GET parameters.
     */
    private function makeQueryStr()
    {
        $select = $this->makeSelect();
        $conditions = $this->makeYearCondition();

        if($conditions == '')
            return 'select * from Ethnics order by year';
        else
            return /*$select .*/ ' select * from Ethnics where ' . $conditions . ' order by year';
    }


    public function makeYearCondition()
    {
        if(!isset($_GET['year']))
            return '';

        $yearStr = $_GET['year'];

        if(strpos($yearStr, '-'))
        {
            //If year str contains '-' then it's a range
            $range = explode('-',$yearStr);
            return " (year >= {$range[0]} and year <= {$range[1]}) ";
        }
        else
        {
            //Else it's just one year
            return " (year = {$_GET['year']}) ";
        }
    }

    public function makeSelect()
    {

        $result = 'select state, year ';
        if(!isset($_GET['gender']) || count($this->getValidGenders($_GET['gender']))==0)
            return $result . ', male, female, total ';
        else
        {
            $genderArray = $this->getValidGenders($_GET['gender']);
            $result = $result . ', ';
            for($i = 0; $i < count($genderArray); $i++)
            {
                $result = $result . $genderArray[$i];
                if($i < count($genderArray) - 1)
                    $result = $result . ' ,';
            }

            return $result . ' ';
        }
    }

    public function getValidGenders($str)
    {
        $genders = explode(' ',$str);
        $result = array();
        foreach($genders as $gender)
        {
            if($gender == 'male' || $gender == 'female' || $gender = 'total')
                array_push($result, $gender);
        }
        return $result;
    }

    /**
     * returns true or false if the data for gender should be included in the output.
     * @param $gender
     */
    public function includeGender($gender)
    {
        if(!isset($_GET['gender']))
            return true;

        $genders = $this->getValidGenders($_GET['gender']);

        if(count($genders) == 0)
            return true;

        return in_array($gender, $genders);
    }

    public function actionYearRange()
    {
        $dataProvider = new CSqlDataProvider('select min(year) as min, max(year) as max from States;',
            array('pagination'=>false));
        $data = $dataProvider->getData();
        echo json_encode(array('min'=>(int)$data[0]['min'], 'max'=>(int)$data[0]['max']));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return DustTypes the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model=DustTypes::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param DustTypes $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='dust-types-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
