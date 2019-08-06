<?php

/* @Twig/Exception/error.txt.twig */
class __TwigTemplate_33eafd1121e44721a97e8a1ee98bf85f5d4ef478c4f25cbd85471052bf91ecab extends Twig_Template
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
        $__internal_473895f8732fbab206c6b08da9e4ada6b17aa7856a8ac3ae00adb3b6b433fde1 = $this->env->getExtension("native_profiler");
        $__internal_473895f8732fbab206c6b08da9e4ada6b17aa7856a8ac3ae00adb3b6b433fde1->enter($__internal_473895f8732fbab206c6b08da9e4ada6b17aa7856a8ac3ae00adb3b6b433fde1_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/error.txt.twig"));

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
        
        $__internal_473895f8732fbab206c6b08da9e4ada6b17aa7856a8ac3ae00adb3b6b433fde1->leave($__internal_473895f8732fbab206c6b08da9e4ada6b17aa7856a8ac3ae00adb3b6b433fde1_prof);

    }

    public function getTemplateName()
    {
        return "@Twig/Exception/error.txt.twig";
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
