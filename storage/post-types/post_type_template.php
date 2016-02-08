<?php
if(!class_exists('PostTypeTemplate'))
{
    /**
     * A PostTypeTemplate class that provides 3 additional meta fields
     */
    class PostTypeTemplate
    {
        const POST_TYPE = "post-type-template";
        private $_meta  = array(
            'meta_a',
            'meta_b',
            'meta_c',
        );
    } // END class PostTypeTemplate
} // END if(!class_exists('PostTypeTemplate'))

?>