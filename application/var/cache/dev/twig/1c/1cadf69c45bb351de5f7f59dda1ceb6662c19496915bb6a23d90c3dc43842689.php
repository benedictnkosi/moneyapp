<?php

/* @Twig/Exception/exception.js.twig */
class __TwigTemplate_8825cd40c84f8e23bfa21e13b5f88ccd67424b77ac0398937b5b002b79c84a2b extends Twig_Template
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
        $__internal_cd1c3f7baa1dea6be3627908a00a42e0cc34ded3e8ca2ebd8fd1021bfb0f4384 = $this->env->getExtension("native_profiler");
        $__internal_cd1c3f7baa1dea6be3627908a00a42e0cc34ded3e8ca2ebd8fd1021bfb0f4384->enter($__internal_cd1c3f7baa1dea6be3627908a00a42e0cc34ded3e8ca2ebd8fd1021bfb0f4384_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception.js.twig"));

        // line 1
        echo "/*
";
        // line 2
        $this->loadTemplate("@Twig/Exception/exception.txt.twig", "@Twig/Exception/exception.js.twig", 2)->display(array_merge($context, array("exception" => (isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")))));
        // line 3
        echo "*/
";
        
        $__internal_cd1c3f7baa1dea6be3627908a00a42e0cc34ded3e8ca2ebd8fd1021bfb0f4384->leave($__internal_cd1c3f7baa1dea6be3627908a00a42e0cc34ded3e8ca2ebd8fd1021bfb0f4384_prof);

    }

    public function getTemplateName()
    {
        return "@Twig/Exception/exception.js.twig";
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
