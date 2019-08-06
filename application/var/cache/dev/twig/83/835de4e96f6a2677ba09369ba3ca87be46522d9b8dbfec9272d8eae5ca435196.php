<?php

/* TwigBundle:Exception:exception.css.twig */
class __TwigTemplate_0fbd021f277ed6f21ed8fe833ecb5088d9cf9371c46a77db43d10ca3d7a564c5 extends Twig_Template
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
        $__internal_9f0b2fd65c0d9980463a642d6d29bc2542eba9b1f2d29f100a82251d8beddb12 = $this->env->getExtension("native_profiler");
        $__internal_9f0b2fd65c0d9980463a642d6d29bc2542eba9b1f2d29f100a82251d8beddb12->enter($__internal_9f0b2fd65c0d9980463a642d6d29bc2542eba9b1f2d29f100a82251d8beddb12_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:exception.css.twig"));

        // line 1
        echo "/*
";
        // line 2
        $this->loadTemplate("@Twig/Exception/exception.txt.twig", "TwigBundle:Exception:exception.css.twig", 2)->display(array_merge($context, array("exception" => (isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")))));
        // line 3
        echo "*/
";
        
        $__internal_9f0b2fd65c0d9980463a642d6d29bc2542eba9b1f2d29f100a82251d8beddb12->leave($__internal_9f0b2fd65c0d9980463a642d6d29bc2542eba9b1f2d29f100a82251d8beddb12_prof);

    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:exception.css.twig";
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
