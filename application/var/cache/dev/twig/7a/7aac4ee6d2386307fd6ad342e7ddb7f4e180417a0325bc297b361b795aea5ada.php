<?php

/* TwigBundle:Exception:error.css.twig */
class __TwigTemplate_5e6c464d1e9a8f73aa2d149252f4471bb224e8781f1e6662b5f7cd3b0082f630 extends Twig_Template
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
        $__internal_22f13068891f3fca8c1efd950a577a61057569ccda7e54a2e1e691903845d074 = $this->env->getExtension("native_profiler");
        $__internal_22f13068891f3fca8c1efd950a577a61057569ccda7e54a2e1e691903845d074->enter($__internal_22f13068891f3fca8c1efd950a577a61057569ccda7e54a2e1e691903845d074_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:error.css.twig"));

        // line 1
        echo "/*
";
        // line 2
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "css", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "css", null, true);
        echo "

*/
";
        
        $__internal_22f13068891f3fca8c1efd950a577a61057569ccda7e54a2e1e691903845d074->leave($__internal_22f13068891f3fca8c1efd950a577a61057569ccda7e54a2e1e691903845d074_prof);

    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:error.css.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  25 => 2,  22 => 1,);
    }
}
/* /**/
/* {{ status_code }} {{ status_text }}*/
/* */
/* *//* */
/* */
