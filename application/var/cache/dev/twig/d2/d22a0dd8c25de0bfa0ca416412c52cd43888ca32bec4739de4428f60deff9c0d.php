<?php

/* TwigBundle:Exception:error.atom.twig */
class __TwigTemplate_2118882499c21259887a26821cc24300c83fd96321ebf14127e7b6a7858da7e4 extends Twig_Template
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
        $__internal_81372e19d5ba97612a61080c01443505c980bbced96760feb109b5ed6be9c48e = $this->env->getExtension("native_profiler");
        $__internal_81372e19d5ba97612a61080c01443505c980bbced96760feb109b5ed6be9c48e->enter($__internal_81372e19d5ba97612a61080c01443505c980bbced96760feb109b5ed6be9c48e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:error.atom.twig"));

        // line 1
        $this->loadTemplate("@Twig/Exception/error.xml.twig", "TwigBundle:Exception:error.atom.twig", 1)->display($context);
        
        $__internal_81372e19d5ba97612a61080c01443505c980bbced96760feb109b5ed6be9c48e->leave($__internal_81372e19d5ba97612a61080c01443505c980bbced96760feb109b5ed6be9c48e_prof);

    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:error.atom.twig";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* {% include '@Twig/Exception/error.xml.twig' %}*/
/* */
