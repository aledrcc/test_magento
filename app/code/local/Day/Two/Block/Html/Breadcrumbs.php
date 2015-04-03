<?php

class Day_Two_Block_Html_Breadcrumbs extends Mage_Page_Block_Html_Breadcrumbs
{
    protected function _construct()
    {
        $this->addCrumb('google link', array(
                                            'label' => 'Google',
                                            'title' => 'Go to the Google',
                                            'link' => 'http://google.com',
                                            ));
    }
}