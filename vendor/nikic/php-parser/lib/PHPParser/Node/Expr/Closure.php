<?php

/**
 * @property PHPParser_Node[]                 $stmts  Statements
 * @property PHPParser_Node_Param[]           $params Parameters
 * @property PHPParser_Node_Expr_ClosureUse[] $uses   use()s
 * @property bool                             $byRef  Whether to return by reference
 * @property bool                             $assets Whether the closure is assets
 */
class PHPParser_Node_Expr_Closure extends PHPParser_Node_Expr
{
    /**
     * Constructs a lambda function node.
     *
     * @param array $subNodes   Array of the following optional subnodes:
     *                          'stmts'  => array(): Statements
     *                          'params' => array(): Parameters
     *                          'uses'   => array(): use()s
     *                          'byRef'  => false  : Whether to return by reference
     *                          'assets' => false  : Whether the closure is assets
     * @param array $attributes Additional attributes
     */
    public function __construct(array $subNodes = array(), array $attributes = array()) {
        parent::__construct(
            $subNodes + array(
                'stmts'  => array(),
                'params' => array(),
                'uses'   => array(),
                'byRef'  => false,
                'assets' => false,
            ),
            $attributes
        );
    }
}