<?php

/* @Twig/Exception/exception.css.twig */
class __TwigTemplate_9a261bf19a67002a4da3b5f93e3e128516ab7b4a208dad8317da1b02fde4767e extends Twig_Template
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
        $__internal_544b1918cef77bb743e12e032ca3a61a10842a994acbf4666bcdf00449df0566 = $this->env->getExtension("native_profiler");
        $__internal_544b1918cef77bb743e12e032ca3a61a10842a994acbf4666bcdf00449df0566->enter($__internal_544b1918cef77bb743e12e032ca3a61a10842a994acbf4666bcdf00449df0566_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception.css.twig"));

        // line 1
        echo "/*
";
        // line 2
        $this->loadTemplate("@Twig/Exception/exception.txt.twig", "@Twig/Exception/exception.css.twig", 2)->display(array_merge($context, array("exception" => (isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")))));
        // line 3
        echo "*/
";
        
        $__internal_544b1918cef77bb743e12e032ca3a61a10842a994acbf4666bcdf00449df0566->leave($__internal_544b1918cef77bb743e12e032ca3a61a10842a994acbf4666bcdf00449df0566_prof);

    }

    public function getTemplateName()
    {
        return "@Twig/Exception/exception.css.twig";
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
