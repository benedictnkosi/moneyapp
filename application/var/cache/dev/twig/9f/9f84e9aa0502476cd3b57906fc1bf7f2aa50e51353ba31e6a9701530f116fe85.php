<?php

/* @WebProfiler/Profiler/ajax_layout.html.twig */
class __TwigTemplate_7c8b8539c9478dc245f62abd3cc006356b37da1d21d909959e71679b3bc4596d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'panel' => array($this, 'block_panel'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_f67e491467d8f5b0e83cdc570a0d95b65f555594426f5a74a4bf58a0795c8d1b = $this->env->getExtension("native_profiler");
        $__internal_f67e491467d8f5b0e83cdc570a0d95b65f555594426f5a74a4bf58a0795c8d1b->enter($__internal_f67e491467d8f5b0e83cdc570a0d95b65f555594426f5a74a4bf58a0795c8d1b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Profiler/ajax_layout.html.twig"));

        // line 1
        $this->displayBlock('panel', $context, $blocks);
        
        $__internal_f67e491467d8f5b0e83cdc570a0d95b65f555594426f5a74a4bf58a0795c8d1b->leave($__internal_f67e491467d8f5b0e83cdc570a0d95b65f555594426f5a74a4bf58a0795c8d1b_prof);

    }

    public function block_panel($context, array $blocks = array())
    {
        $__internal_b38fc9dd4066b8652babbf1fc69e22412031223f5cad5b5249299e23a9594edc = $this->env->getExtension("native_profiler");
        $__internal_b38fc9dd4066b8652babbf1fc69e22412031223f5cad5b5249299e23a9594edc->enter($__internal_b38fc9dd4066b8652babbf1fc69e22412031223f5cad5b5249299e23a9594edc_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        echo "";
        
        $__internal_b38fc9dd4066b8652babbf1fc69e22412031223f5cad5b5249299e23a9594edc->leave($__internal_b38fc9dd4066b8652babbf1fc69e22412031223f5cad5b5249299e23a9594edc_prof);

    }

    public function getTemplateName()
    {
        return "@WebProfiler/Profiler/ajax_layout.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  23 => 1,);
    }
}
/* {% block panel '' %}*/
/* */
