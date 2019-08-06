<?php

/* @Twig/Exception/exception.atom.twig */
class __TwigTemplate_d9977d000c19e6c098cca9cba93c29de08e6f99fe7904a4b251460b5484e5fcb extends Twig_Template
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
        $__internal_ae230cb95a7e6d187505a2511ee8ba00ad400b268f06af82930f4fda7b1cd7b8 = $this->env->getExtension("native_profiler");
        $__internal_ae230cb95a7e6d187505a2511ee8ba00ad400b268f06af82930f4fda7b1cd7b8->enter($__internal_ae230cb95a7e6d187505a2511ee8ba00ad400b268f06af82930f4fda7b1cd7b8_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception.atom.twig"));

        // line 1
        $this->loadTemplate("@Twig/Exception/exception.xml.twig", "@Twig/Exception/exception.atom.twig", 1)->display(array_merge($context, array("exception" => (isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")))));
        
        $__internal_ae230cb95a7e6d187505a2511ee8ba00ad400b268f06af82930f4fda7b1cd7b8->leave($__internal_ae230cb95a7e6d187505a2511ee8ba00ad400b268f06af82930f4fda7b1cd7b8_prof);

    }

    public function getTemplateName()
    {
        return "@Twig/Exception/exception.atom.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* {% include '@Twig/Exception/exception.xml.twig' with { 'exception': exception } %}*/
/* */
