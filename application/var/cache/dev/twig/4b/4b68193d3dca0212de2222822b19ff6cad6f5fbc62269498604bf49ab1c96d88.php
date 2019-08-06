<?php

/* TwigBundle:Exception:exception.atom.twig */
class __TwigTemplate_b97a6aae01ae07b9bcb5ae3f548752ba936929116cf9dca5936501876bb69549 extends Twig_Template
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
        $__internal_5eb7b87075f60ff653c50f9efa2a3d294e8a02cdf27a5fdc74f950d6f479bd1c = $this->env->getExtension("native_profiler");
        $__internal_5eb7b87075f60ff653c50f9efa2a3d294e8a02cdf27a5fdc74f950d6f479bd1c->enter($__internal_5eb7b87075f60ff653c50f9efa2a3d294e8a02cdf27a5fdc74f950d6f479bd1c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:exception.atom.twig"));

        // line 1
        $this->loadTemplate("@Twig/Exception/exception.xml.twig", "TwigBundle:Exception:exception.atom.twig", 1)->display(array_merge($context, array("exception" => (isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")))));
        
        $__internal_5eb7b87075f60ff653c50f9efa2a3d294e8a02cdf27a5fdc74f950d6f479bd1c->leave($__internal_5eb7b87075f60ff653c50f9efa2a3d294e8a02cdf27a5fdc74f950d6f479bd1c_prof);

    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:exception.atom.twig";
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
