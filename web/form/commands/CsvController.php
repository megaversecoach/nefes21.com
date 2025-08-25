<?php
/**
 * Copyright (C) Baluart.COM - All Rights Reserved
 *
 * @since 1.3.5
 * @author Balu
 * @copyright Copyright (c) 2015 - 2020 Baluart.COM
 * @license http://codecanyon.net/licenses/faq Envato marketplace licenses
 * @link https://easyforms.dev/ Easy Forms
 */

namespace app\commands;

use app\helpers\ArrayHelper;
use app\models\Form;
use app\models\FormSubmission;
use SimpleExcel\SimpleExcel;
use Yii;
use yii\console\Controller;
use yii\console\Exception;
use yii\helpers\Url;

/**
 * Class CsvController
 * @package app\commands
 */
class CsvController extends Controller
{

    /**
     * @var string the default command action.
     */
    public $defaultAction = 'export-submissions';

    /**
     * Export Form Submissions as CSV
     *
     * Eg. php yii csv/export-submissions 1
     */
    public function actionExportSubmissions($id)
    {

        try {


            $formModel = $this->findFormModel($id);
            $formDataModel = $formModel->formData;

            $query = FormSubmission::find()
                ->select(['id', 'data', 'created_at'])
                ->where('{{%form_submission}}.form_id=:form_id', [':form_id' => $id])
                ->orderBy('created_at DESC')
                ->with('files')
                ->asArray();

            // Insert fields names as the header
            $allLabels = $formDataModel->getFieldsForEmail();
            $labels = [];
            foreach ($allLabels as $key => $label) {
                // Exclude Signature Field
                if (substr($key, 0, 16) !== 'hidden_signature') {
                    $labels[$key] = $label;
                }
            }
            $header = array_values($labels);

            // Add File Fields
            $fileFields = $formDataModel->getFileLabels();
            $header = array_merge($header, array_values($fileFields)); // Add only labels
            array_unshift($header, '#');
            array_push($header, Yii::t('app', 'Submitted'));
            $keys = array_keys($labels);

            // File Name To Export
            $fileNameToExport = $formModel->name;

            // Add data
            $data = array(
                $header
            );

            // To iterate the row one by one
            $i = 1;
            foreach ($query->each() as $submission) {
                // $submission represents one row of data from the form_submission table
                $submissionData = json_decode($submission['data'], true);
                if (is_array($submissionData) && !empty($submissionData)) {
                    // Stringify fields with multiple values
                    foreach ($submissionData as $name => &$field) {
                        if (is_array($field)) {
                            $field = implode(', ', $field);
                        }
                    }
                    // Only take data of current fields
                    $fields = [];
                    $fields["id"] = $i++;
                    foreach ($keys as $key) {
                        // Exclude Signature Field
                        if (substr($key, 0, 16) !== 'hidden_signature') {
                            $fields[$key] = isset($submissionData[$key]) ? $submissionData[$key] : '';
                        }
                    }
                    // Add files
                    foreach ($fileFields as $name => $label) {
                        if (isset($submission['files']) && is_array($submission['files']) && count($submission['files']) > 0) {
                            $file = ArrayHelper::first(ArrayHelper::filter($submission['files'], $name, 'field'));
                            if (isset($file['name'], $file['extension'])) {
                                $fileName = $file['name'] .'.'.$file['extension'];
                                $fields[$name] = Url::base(true) . '/' . Form::FILES_DIRECTORY . '/' . $formModel->id . '/' . $fileName;
                            } else {
                                $fields[$name] = '';
                            }
                        } else {
                            $fields[$name] = '';
                        }
                    }
                    // Add date
                    $fields["created_at"] = Yii::$app->formatter->asDatetime($submission['created_at']);
                    array_push($data, $fields);
                }
            }

            $excel = new SimpleExcel("csv");
            $excel->writer->setData($data);
            $excel->writer->saveFile($fileNameToExport);
            exit;

        } catch (\Exception $e) {

            throw new Exception($e->getMessage());

        }

    }

    /**
     * Finds the Form model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * If the user does not have access, a Forbidden Http Exception will be thrown.
     *
     * @param $id
     * @return Form
     * @throws Exception
     */
    protected function findFormModel($id)
    {
        if (($model = Form::findOne(['id' => $id])) !== null) {
            return $model;
        } else {
            throw new Exception("The requested Form ID does not exist.");
        }
    }
}