<?php

/* @Twig/Exception/error.xml.twig */
class __TwigTemplate_92297c9f31a264351c9d1ae02f02f6321b0a81dd5a52895090e45a473f65c71b extends Twig_Template
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
        $__internal_61b4c3834b8235e2d967b95caeff78fb64b5d251657176bb20ba2d80a2cd2e05 = $this->env->getExtension("native_profiler");
        $__internal_61b4c3834b8235e2d967b95caeff78fb64b5d251657176bb20ba2d80a2cd2e05->enter($__internal_61b4c3834b8235e2d967b95caeff78fb64b5d251657176bb20ba2d80a2cd2e05_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/error.xml.twig"));

        // line 1
        echo "<?xml version=\"1.0\" encoding=\"";
        echo twig_escape_filter($this->env, $this->env->getCharset(), "html", null, true);
        echo "\" ?>

<error code=\"";
        // line 3
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo "\" message=\"";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo "\" />
";
        
        $__internal_61b4c3834b8235e2d967b95caeff78fb64b5d251657176bb20ba2d80a2cd2e05->leave($__internal_61b4c3834b8235e2d967b95caeff78fb64b5d251657176bb20ba2d80a2cd2e05_prof);

    }

    public function getTemplateName()
    {
        return "@Twig/Exception/error.xml.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  28 => 3,  22 => 1,);
    }
}
/* <?xml version="1.0" encoding="{{ _charset }}" ?>*/
/* */
/* <error code="{{ status_code }}" message="{{ status_text }}" />*/
/* */
