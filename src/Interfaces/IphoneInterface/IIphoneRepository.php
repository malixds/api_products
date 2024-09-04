<?php
namespace Interfaces\IphoneInterface;
interface IIphoneRepository
{
    public function find($id);
    public function save($data);
    public function get();

}