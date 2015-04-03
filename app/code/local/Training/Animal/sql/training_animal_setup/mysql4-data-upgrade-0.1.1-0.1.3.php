<?php

//Puse esto para que no haga nada ya que no puedo ver tablas por ahora
//die('pitririri');

$installer = $this;
/* @var $installer Mage_Core_Model_Resource_Setup */

$installer->startSetup();

$installer->run("
    ALTER TABLE {$installer->getTable('training/animal')} ADD trainable
      TINYINT(1) UNSIGNED NOT NULL DEFAULT 0 AFTER edible;
");

$installer->endSetup();