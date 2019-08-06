<?php

/* TwigBundle:Exception:error.js.twig */
class __TwigTemplate_d7a9644bd3a76a191891dc57f3cdfaa1ff1175e9464c589980cbbf038c6289ce extends Twig_Template
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
        $__internal_191bbe8f84a268fef9cd486b7b097a5ff0b96fd3015812d62d079940bd3309ba = $this->env->getExtension("native_profiler");
        $__internal_191bbe8f84a268fef9cd486b7b097a5ff0b96fd3015812d62d079940bd3309ba->enter($__internal_191bbe8f84a268fef9cd486b7b097a5ff0b96fd3015812d62d079940bd3309ba_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:error.js.twig"));

        // line 1
        echo "/*
";
        // line 2
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "js", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "js", null, true);
        echo "

*/
";
        
        $__internal_191bbe8f84a268fef9cd486b7b097a5ff0b96fd3015812d62d079940bd3309ba->leave($__internal_191bbe8f84a268fef9cd486b7b097a5ff0b96fd3015812d62d079940bd3309ba_prof);

    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:error.js.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  25 => 2,  22 => 1,);
    }
}
/* /**/
/* {{ status_code }} {{ status_text }}*/
/* */
/* *//* */
/* */
