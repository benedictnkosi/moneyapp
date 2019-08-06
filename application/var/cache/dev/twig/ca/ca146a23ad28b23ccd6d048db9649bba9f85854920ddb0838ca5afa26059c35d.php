<?php

/* TwigBundle:Exception:exception.json.twig */
class __TwigTemplate_aa2565c3d1c5956de24b196cda5ab1e2fda5000cccd6d047000750b94d882fcd extends Twig_Template
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
        $__internal_38907db14138ba527572cfc4297e4bfb0db53995a0fecd1bbc1f780518a61660 = $this->env->getExtension("native_profiler");
        $__internal_38907db14138ba527572cfc4297e4bfb0db53995a0fecd1bbc1f780518a61660->enter($__internal_38907db14138ba527572cfc4297e4bfb0db53995a0fecd1bbc1f780518a61660_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:exception.json.twig"));

        // line 1
        echo twig_jsonencode_filter(array("error" => array("code" => (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "message" => (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "exception" => $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "toarray", array()))));
        echo "
";
        
        $__internal_38907db14138ba527572cfc4297e4bfb0db53995a0fecd1bbc1f780518a61660->leave($__internal_38907db14138ba527572cfc4297e4bfb0db53995a0fecd1bbc1f780518a61660_prof);

    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:exception.json.twig";
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
