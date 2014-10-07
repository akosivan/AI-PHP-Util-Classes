<?php
namespace AI\Data\Repository;

interface EntityFinderInterface {

    public function findAll();
    public function find($id);
    public function findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null);
    public function findOneBy(array $criteria);

}