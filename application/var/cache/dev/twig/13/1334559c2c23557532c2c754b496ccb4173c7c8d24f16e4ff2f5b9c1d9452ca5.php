<?php

/* TwigBundle:Exception:exception.js.twig */
class __TwigTemplate_95f30ec0568f6639c364951015171109d05f2832bee33aaa9a4f7902918fa3f9 extends Twig_Template
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
        $__internal_dabada1a3d8818c3b48ba53a85408d8aaaa0589ce670448d54459f3b5552558e = $this->env->getExtension("native_profiler");
        $__internal_dabada1a3d8818c3b48ba53a85408d8aaaa0589ce670448d54459f3b5552558e->enter($__internal_dabada1a3d8818c3b48ba53a85408d8aaaa0589ce670448d54459f3b5552558e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:exception.js.twig"));

        // line 1
        echo "/*
";
        // line 2
        $this->loadTemplate("@Twig/Exception/exception.txt.twig", "TwigBundle:Exception:exception.js.twig", 2)->display(array_merge($context, array("exception" => (isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")))));
        // line 3
        echo "*/
";
        
        $__internal_dabada1a3d8818c3b48ba53a85408d8aaaa0589ce670448d54459f3b5552558e->leave($__internal_dabada1a3d8818c3b48ba53a85408d8aaaa0589ce670448d54459f3b5552558e_prof);

    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:exception.js.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  27 => 3,  25 => 2,  22 => 1,);
    }
}
/* /**/
/* {% include '@Twig/Exception/exception.txt.twig' with { 'exception': exception } %}*/
/* *//* */
/* */
