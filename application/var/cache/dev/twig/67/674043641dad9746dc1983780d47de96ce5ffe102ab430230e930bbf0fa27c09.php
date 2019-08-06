<?php

/* @Twig/Exception/error.json.twig */
class __TwigTemplate_f64c07d933dcd3b45df124605662b713dbe52b2c0922d02f17484642a03ba11b extends Twig_Template
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
        $__internal_bd5ea2a853d1dfa46dd82f28540eb637d541b287d89b3cdfa6a59be413f33b35 = $this->env->getExtension("native_profiler");
        $__internal_bd5ea2a853d1dfa46dd82f28540eb637d541b287d89b3cdfa6a59be413f33b35->enter($__internal_bd5ea2a853d1dfa46dd82f28540eb637d541b287d89b3cdfa6a59be413f33b35_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/error.json.twig"));

        // line 1
        echo twig_jsonencode_filter(array("error" => array("code" => (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "message" => (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")))));
        echo "
";
        
        $__internal_bd5ea2a853d1dfa46dd82f28540eb637d541b287d89b3cdfa6a59be413f33b35->leave($__internal_bd5ea2a853d1dfa46dd82f28540eb637d541b287d89b3cdfa6a59be413f33b35_prof);

    }

    public function getTemplateName()
    {
        return "@Twig/Exception/error.json.twig";
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
