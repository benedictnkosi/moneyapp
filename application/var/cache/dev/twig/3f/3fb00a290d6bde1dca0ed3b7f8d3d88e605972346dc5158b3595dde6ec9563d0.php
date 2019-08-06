<?php

/* @Twig/Exception/exception.rdf.twig */
class __TwigTemplate_7d4b02328d12c8c043f76e18624489b1f9e14d216c86ce010de60fa05d1b1b7d extends Twig_Template
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
        $__internal_33c37000f6a57562f788788be45bdc94fa1780c70a8fac35676bebb575282c9f = $this->env->getExtension("native_profiler");
        $__internal_33c37000f6a57562f788788be45bdc94fa1780c70a8fac35676bebb575282c9f->enter($__internal_33c37000f6a57562f788788be45bdc94fa1780c70a8fac35676bebb575282c9f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception.rdf.twig"));

        // line 1
        $this->loadTemplate("@Twig/Exception/exception.xml.twig", "@Twig/Exception/exception.rdf.twig", 1)->display(array_merge($context, array("exception" => (isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")))));
        
        $__internal_33c37000f6a57562f788788be45bdc94fa1780c70a8fac35676bebb575282c9f->leave($__internal_33c37000f6a57562f788788be45bdc94fa1780c70a8fac35676bebb575282c9f_prof);

    }

    public function getTemplateName()
    {
        return "@Twig/Exception/exception.rdf.twig";
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
