<?php

//Puse esto para que no haga nada ya que no puedo ver tablas por ahora
//die('turururu');

$installer = $this;

/* @var $installer Mage_Core_Model_Resource_Setup */

$installer->startSetup();

$installer->run("
DROP TABLE IF EXISTS {$installer->getTable('training/animal')};
CREATE TABLE {$installer->getTable('training/animal')} (
  entity_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL DEFAULT '',
  type VARCHAR(255) NOT NULL DEFAULT '',
  edible TINYINT(1) UNSIGNED NOT NULL DEFAULT 1,
  comment TEXT NULL,
  updated_at DATETIME,
  created_at DATETIME
) Engine=InnoDB DEFAULT CHARSET=utf8;
");

$installer->endSetup();