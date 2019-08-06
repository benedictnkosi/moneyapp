<?php

/* TwigBundle:Exception:error.rdf.twig */
class __TwigTemplate_3938effea96874f31bdfcea64cfaf2386b3924cd374c7b436d72ae244cb4eb11 extends Twig_Template
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
        $__internal_e946945c0aa38a36b300600bd90b42610c3b9ce1024e555f0565bbf2ad73e076 = $this->env->getExtension("native_profiler");
        $__internal_e946945c0aa38a36b300600bd90b42610c3b9ce1024e555f0565bbf2ad73e076->enter($__internal_e946945c0aa38a36b300600bd90b42610c3b9ce1024e555f0565bbf2ad73e076_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:error.rdf.twig"));

        // line 1
        $this->loadTemplate("@Twig/Exception/error.xml.twig", "TwigBundle:Exception:error.rdf.twig", 1)->display($context);
        
        $__internal_e946945c0aa38a36b300600bd90b42610c3b9ce1024e555f0565bbf2ad73e076->leave($__internal_e946945c0aa38a36b300600bd90b42610c3b9ce1024e555f0565bbf2ad73e076_prof);

    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:error.rdf.twig";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* {% include '@Twig/Exception/error.xml.twig' %}*/
/* */
