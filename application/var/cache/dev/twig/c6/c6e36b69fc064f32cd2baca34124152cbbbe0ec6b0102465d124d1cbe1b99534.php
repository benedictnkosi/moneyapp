<?php

/* @Twig/Exception/error.atom.twig */
class __TwigTemplate_5d4e6a081223d976847594e93c0a3ec78005da70b17dad8b665193c438bea419 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_a1e7800148d4a492061aa670b3eced52e3680ef66f27ae734c309a52c9417877 = $this->env->getExtension("native_profiler");
        $__internal_a1e7800148d4a492061aa670b3eced52e3680ef66f27ae734c309a52c9417877->enter($__internal_a1e7800148d4a492061aa670b3eced52e3680ef66f27ae734c309a52c9417877_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/error.atom.twig"));

        // line 1
        $this->loadTemplate("@Twig/Exception/error.xml.twig", "@Twig/Exception/error.atom.twig", 1)->display($context);
        
        $__internal_a1e7800148d4a492061aa670b3eced52e3680ef66f27ae734c309a52c9417877->leave($__internal_a1e7800148d4a492061aa670b3eced52e3680ef66f27ae734c309a52c9417877_prof);

    }

    public function getTemplateName()
    {
        return "@Twig/Exception/error.atom.twig";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* {% include '@Twig/Exception/error.xml.twig' %}*/
/* */
