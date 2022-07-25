<?php

namespace App\Core;

use DB;

class Model
{
    protected $table = "";

    /**
     * Return singleton instance
     *
     * @return static|null
     */
    public static function getInstance()
    {
        static $instance = null;
        if (null === $instance) {
            $instance = new static();
        }

        return $instance;
    }

    public function getTableName()
    {
        return $this->table;
    }

    /**
     * @param array $record
     * @return mixed
     */
    public function insert(array $record)
    {
        return DB::insert($this->table, $record);
    }

    /**
     * @param array $record
     * @return mixed
     */
    public function insertIgnore(array $record)
    {
        return DB::insertIgnore($this->table, $record);
    }

    /**
     * @param string $term
     * @return int|mixed
     */
    public function findTotalMatch(string $term)
    {
        $result = $this->searchForTerm($term, 'count(*) matches');
        return (int) $result[0]['matches'] ?? 0;
    }

    /**
     * @param string $term
     * @param string $fields
     * @param string $append
     * @return mixed
     */
    public function searchForTerm(string $term, $fields = '*', $append = '')
    {
        $params = [];
        $sql = "select $fields from " . $this->table;
        if ($term != "") {
            $params = $this->buildSearchQuery($sql, $term);
        }
        $sql .= $append;

        $result = DB::query($sql, $params);
        return $result;
    }

    /**
     * Match filters
     *
     * @param string $sql
     * @param string $term
     * @return array
     */
    private function buildSearchQuery(string &$sql, string $term)
    {
        $params = [];
        $search = [];
        foreach ($this->fillable as $field) {
            $search[] = "$field like %s_{$field}";
            $params["$field"] = '%' . $term . '%';
        }
        $sql = $sql . " where " . implode(' or ', $search);
        return $params;
    }

    /**
     * @param string $term
     * @param int $offset
     * @param int $limit
     * @return mixed
     */
    public function searchRecords(string $term, int $offset = 0, int $limit = 0)
    {
        $result = $this->searchForTerm($term, '*', " limit $limit offset $offset");
        return $result;
    }

    /**
     * Truncate model data
     *
     * @return mixed
     */
    public function truncate()
    {
        return DB::query("truncate table " . $this->table);
    }

}