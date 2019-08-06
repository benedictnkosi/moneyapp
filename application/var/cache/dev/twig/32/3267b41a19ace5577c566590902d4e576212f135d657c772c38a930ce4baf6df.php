<?php

/* TwigBundle:Exception:exception.rdf.twig */
class __TwigTemplate_b1382e0754ecff735b85c70330e056686ba47920528749515b868e88d7524359 extends Twig_Template
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
        $__internal_1f810bf3cce9e9a6721d3aa7b450a4b83c986a6752db9f2afbb72e618a286857 = $this->env->getExtension("native_profiler");
        $__internal_1f810bf3cce9e9a6721d3aa7b450a4b83c986a6752db9f2afbb72e618a286857->enter($__internal_1f810bf3cce9e9a6721d3aa7b450a4b83c986a6752db9f2afbb72e618a286857_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:exception.rdf.twig"));

        // line 1
        $this->loadTemplate("@Twig/Exception/exception.xml.twig", "TwigBundle:Exception:exception.rdf.twig", 1)->display(array_merge($context, array("exception" => (isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")))));
        
        $__internal_1f810bf3cce9e9a6721d3aa7b450a4b83c986a6752db9f2afbb72e618a286857->leave($__internal_1f810bf3cce9e9a6721d3aa7b450a4b83c986a6752db9f2afbb72e618a286857_prof);

    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:exception.rdf.twig";
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
/* {% include '@Twig/Exception/exception.xml.twig' with { 'exception': exception } %}*/
/* */
