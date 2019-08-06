<?php

/* TwigBundle:Exception:error.txt.twig */
class __TwigTemplate_c551a3642fa38222ac2ffd28b884d969edf92cfe716d847b1bc59ecf5c519061 extends Twig_Template
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
        $__internal_8f0ee3f3c735a6304b17a8760a8bee6427c4524146065d12f09b888b1796a0d2 = $this->env->getExtension("native_profiler");
        $__internal_8f0ee3f3c735a6304b17a8760a8bee6427c4524146065d12f09b888b1796a0d2->enter($__internal_8f0ee3f3c735a6304b17a8760a8bee6427c4524146065d12f09b888b1796a0d2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:error.txt.twig"));

        // line 1
        echo "Oops! An Error Occurred
=======================

The server returned a \"";
        // line 4
        echo (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code"));
        echo " ";
        echo (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text"));
        echo "\".

Something is broken. Please let us know what you were doing when this error occurred.
We will fix it as soon as possible. Sorry for any inconvenience caused.
";
        
        $__internal_8f0ee3f3c735a6304b17a8760a8bee6427c4524146065d12f09b888b1796a0d2->leave($__internal_8f0ee3f3c735a6304b17a8760a8bee6427c4524146065d12f09b888b1796a0d2_prof);

    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:error.txt.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  27 => 4,  22 => 1,);
    }
}
/* Oops! An Error Occurred*/
/* =======================*/
/* */
/* The server returned a "{{ status_code }} {{ status_text }}".*/
/* */
/* Something is broken. Please let us know what you were doing when this error occurred.*/
/* We will fix it as soon as possible. Sorry for any inconvenience caused.*/
/* */
