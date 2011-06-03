<?php

/**
 * Description of DoctrineQuery
 *
 * @author Sugar
 */
class Cs_Paginator_Adapter_DoctrineQuery
    implements Zend_Paginator_Adapter_Interface
{

    /**
     *
     * @var Doctrine_Query $_query
     */
    protected $_query;
    
    /**
     * @var Doctrine_Pager $_pager
     */
    protected $_pager;


    public function __construct(Doctrine_Query $query) {
        $this->setQuery($query);

    }

    public function getItems($offset, $itemCountPerPage) {
        $pager = new Doctrine_Pager($this->getQuery(), $offset, $itemCountPerPage);
        return $pager->execute();
    }

    public function count() {
        return $this->getQuery()->count();
    }


    public function getQuery() {
        return $this->_query;
    }


    public function setQuery($query) {
        $this->_query = $query;
    }


    public function getPager() {
        return $this->_pager;
    }

    public function setPager($pager) {
        $this->_pager = $pager;
    }




}

