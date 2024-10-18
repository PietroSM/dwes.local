<?php
require_once __DIR__ . '/../database/QueryBuilder.class.php';

class categoriaRepository extends QueryBuilder
{
    /**
     * @param string $table
     * @param string $classEntity
     */
    public function __construct(string $table = 'categorias', string $classEntity = 'categoria')
    {
        parent::__construct($table, $classEntity);
    }
}