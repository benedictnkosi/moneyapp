<?php

/* @Twig/Exception/exception.json.twig */
class __TwigTemplate_090ce6f4a2ec8437bbed285dca6c84e474f3b0341f95b377aab5d138b4728f27 extends Twig_Template
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
        $__internal_4b855f29ed16bf42cff1fb28f7bfbf858b8e8c11a1f51d3aa1541fbd78dd998c = $this->env->getExtension("native_profiler");
        $__internal_4b855f29ed16bf42cff1fb28f7bfbf858b8e8c11a1f51d3aa1541fbd78dd998c->enter($__internal_4b855f29ed16bf42cff1fb28f7bfbf858b8e8c11a1f51d3aa1541fbd78dd998c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception.json.twig"));

        // line 1
        echo twig_jsonencode_filter(array("error" => array("code" => (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "message" => (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "exception" => $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "toarray", array()))));
        echo "
";
        
        $__internal_4b855f29ed16bf42cff1fb28f7bfbf858b8e8c11a1f51d3aa1541fbd78dd998c->leave($__internal_4b855f29ed16bf42cff1fb28f7bfbf858b8e8c11a1f51d3aa1541fbd78dd998c_prof);

    }

    public function getTemplateName()
    {
        return "@Twig/Exception/exception.json.twig";
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
/* {{ { 'error': { 'code': status_code, 'message': status_text, 'exception': exception.toarray } }|json_encode|raw }}*/
/* */
