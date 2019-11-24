<?php
namespace Org;


class DataToObject
{
  private $data; // 传入的数据
  private $print; // 将要输出的值 暂时没用

  public function __construct($data)
  {
    $this->data = $data;
  }

  public function __get($name)
  {
    $data = $this->data[$name];
    if (is_array($data)) {
      $data = new self($data);
    }

    // 暂时没用
    $this->print = $data;
    return $data;
  }

  // 暂时没用
  public function __toString()
  {
    return $this->print;
  }
}