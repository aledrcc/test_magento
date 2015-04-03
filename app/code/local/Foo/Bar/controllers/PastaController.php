<?php

// app/code/local/Foo/Var/controllers/PastaController.php

class Foo_Bar_PastaController extends Mage_Core_Controller_Front_Action
{
    public function sleepAction()
    {
        echo '<h1>I\'m so tired after eating yummy pasta</h1>';
    }
}