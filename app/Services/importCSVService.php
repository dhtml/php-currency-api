<?php

namespace App\Services;

use App\Core\Model;
use Exception;
use League\Csv\InvalidArgument;
use League\Csv\Reader;
use League\Csv\Statement;
use League\Csv\TabularDataReader;

class importCSVService
{
    public function import(string $modelName)
    {
        try {
            $model = getModelByName($modelName);
        } catch (Exception $e) {
            exit($e->getMessage());
        }
        $table_name = $model->getTableName();
        console_log("Preparing to import " . $table_name);
        $csvFile = MIGRATION_PATH . ucfirst($table_name) . ".csv";

        $records = $this->readCSVFile($csvFile);
        $this->storeCSVRecords($model, $records);

        console_log("Operation completed successfully");
    }

    /**
     * Parse CSV File
     *
     * @param string $csvPath
     * @return TabularDataReader|void
     * @throws \League\Csv\Exception
     * @throws InvalidArgument
     */
    private function readCSVFile(string $csvPath)
    {
        try {
            $stream = fopen($csvPath, 'r');
        } catch (Exception $e) {
            exit($e->getMessage());
        }

        $csv = Reader::createFromStream($stream);
        $csv->setDelimiter(';');
        $csv->setHeaderOffset(0);

        //build a statement
        $stmt = Statement::create();

        //query your records from the document
        $records = $stmt->process($csv);

        return $records;
    }

    private function storeCSVRecords(Model $model, TabularDataReader $records)
    {
        foreach ($records as $record) {
            $record = $this->formatCsvRecord($record);
            $model->insertIgnore($record);
        }
    }

    /**
     * Format CSV array to regular associative array
     *
     * @param $record
     * @return array
     */
    private function formatCsvRecord($record)
    {
        $formattedArray = [];
        foreach ($record as $key => $value) {
            $keys = explode(",", $key);
            $values = explode(",", $value);
            for ($i = 0; $i < count($keys); $i++) {
                $formattedArray[$keys[$i]] = $values[$i];
            }
            break;
        }
        return $formattedArray;
    }


}