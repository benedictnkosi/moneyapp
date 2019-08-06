<?php

/* TwigBundle:Exception:error.json.twig */
class __TwigTemplate_be88fcbe85d195ae04dbc61aedcae9bf0a53132c0f93b09a670bf955f53ece0c extends Twig_Template
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
        $__internal_16403ac8eedbd5c29358b27d6510aeafdea1b65de165a5e3bcfc7bcd2621f034 = $this->env->getExtension("native_profiler");
        $__internal_16403ac8eedbd5c29358b27d6510aeafdea1b65de165a5e3bcfc7bcd2621f034->enter($__internal_16403ac8eedbd5c29358b27d6510aeafdea1b65de165a5e3bcfc7bcd2621f034_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:error.json.twig"));

        // line 1
        echo twig_jsonencode_filter(array("error" => array("code" => (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "message" => (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")))));
        echo "
";
        
        $__internal_16403ac8eedbd5c29358b27d6510aeafdea1b65de165a5e3bcfc7bcd2621f034->leave($__internal_16403ac8eedbd5c29358b27d6510aeafdea1b65de165a5e3bcfc7bcd2621f034_prof);

    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:error.json.twig";
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
/* {{ { 'error': { 'code': status_code, 'message': status_text } }|json_encode|raw }}*/
/* */
