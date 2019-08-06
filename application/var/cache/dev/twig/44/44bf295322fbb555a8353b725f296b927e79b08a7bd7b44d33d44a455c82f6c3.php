<?php

/* @Twig/Exception/error.css.twig */
class __TwigTemplate_09ba9d38ca3c033cf433979bb69e9f87023acf6dc475adf3fd344c50b936f1a3 extends Twig_Template
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
        $__internal_6a6e124189b36434d74d539e1d6613a72acc27038ce20f7e2c86a60b5f6719f3 = $this->env->getExtension("native_profiler");
        $__internal_6a6e124189b36434d74d539e1d6613a72acc27038ce20f7e2c86a60b5f6719f3->enter($__internal_6a6e124189b36434d74d539e1d6613a72acc27038ce20f7e2c86a60b5f6719f3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/error.css.twig"));

        // line 1
        echo "/*
";
        // line 2
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "css", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "css", null, true);
        echo "

*/
";
        
        $__internal_6a6e124189b36434d74d539e1d6613a72acc27038ce20f7e2c86a60b5f6719f3->leave($__internal_6a6e124189b36434d74d539e1d6613a72acc27038ce20f7e2c86a60b5f6719f3_prof);

    }

    public function getTemplateName()
    {
        return "@Twig/Exception/error.css.twig";
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
