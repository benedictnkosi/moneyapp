<?php

/* @Twig/Exception/error.js.twig */
class __TwigTemplate_882e512c003232417e39b98e17e29a271e7397fcba75aa5470f0a1cb35d88624 extends Twig_Template
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
        $__internal_9f2e4b70bd44b24470ce38149e00135a8410d3a3e39a8ed98a48257b984c501d = $this->env->getExtension("native_profiler");
        $__internal_9f2e4b70bd44b24470ce38149e00135a8410d3a3e39a8ed98a48257b984c501d->enter($__internal_9f2e4b70bd44b24470ce38149e00135a8410d3a3e39a8ed98a48257b984c501d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/error.js.twig"));

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
        
        $__internal_9f2e4b70bd44b24470ce38149e00135a8410d3a3e39a8ed98a48257b984c501d->leave($__internal_9f2e4b70bd44b24470ce38149e00135a8410d3a3e39a8ed98a48257b984c501d_prof);

    }

    public function getTemplateName()
    {
        return "@Twig/Exception/error.js.twig";
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
