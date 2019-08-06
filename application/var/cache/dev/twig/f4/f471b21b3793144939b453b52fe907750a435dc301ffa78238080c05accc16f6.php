<?php

/* TwigBundle:Exception:exception_full.html.twig */
class __TwigTemplate_592d926b1eff636037baa4c1957a9b80ccd63bdc3bebfaaf96893d584408f16e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@Twig/layout.html.twig", "TwigBundle:Exception:exception_full.html.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@Twig/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_75114cc3f5018be357ebc2594049174ce12368f81f686b04a1491b9555e5b7df = $this->env->getExtension("native_profiler");
        $__internal_75114cc3f5018be357ebc2594049174ce12368f81f686b04a1491b9555e5b7df->enter($__internal_75114cc3f5018be357ebc2594049174ce12368f81f686b04a1491b9555e5b7df_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_75114cc3f5018be357ebc2594049174ce12368f81f686b04a1491b9555e5b7df->leave($__internal_75114cc3f5018be357ebc2594049174ce12368f81f686b04a1491b9555e5b7df_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_bf7df2631645dee024fb2eb949488787494e4d51c49df786d961a9e030700c81 = $this->env->getExtension("native_profiler");
        $__internal_bf7df2631645dee024fb2eb949488787494e4d51c49df786d961a9e030700c81->enter($__internal_bf7df2631645dee024fb2eb949488787494e4d51c49df786d961a9e030700c81_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('request')->generateAbsoluteUrl($this->env->getExtension('asset')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_bf7df2631645dee024fb2eb949488787494e4d51c49df786d961a9e030700c81->leave($__internal_bf7df2631645dee024fb2eb949488787494e4d51c49df786d961a9e030700c81_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_a9986b59ba0a1f0ec2b69625dd99a8dddd00db844771456ea490b92196fda71e = $this->env->getExtension("native_profiler");
        $__internal_a9986b59ba0a1f0ec2b69625dd99a8dddd00db844771456ea490b92196fda71e->enter($__internal_a9986b59ba0a1f0ec2b69625dd99a8dddd00db844771456ea490b92196fda71e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_a9986b59ba0a1f0ec2b69625dd99a8dddd00db844771456ea490b92196fda71e->leave($__internal_a9986b59ba0a1f0ec2b69625dd99a8dddd00db844771456ea490b92196fda71e_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_5d0ebf6f867ecf406bbd8d6fa5947a1c1ed9e4d6a36467fbe292ab9d6f4c9a7d = $this->env->getExtension("native_profiler");
        $__internal_5d0ebf6f867ecf406bbd8d6fa5947a1c1ed9e4d6a36467fbe292ab9d6f4c9a7d->enter($__internal_5d0ebf6f867ecf406bbd8d6fa5947a1c1ed9e4d6a36467fbe292ab9d6f4c9a7d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("@Twig/Exception/exception.html.twig", "TwigBundle:Exception:exception_full.html.twig", 12)->display($context);
        
        $__internal_5d0ebf6f867ecf406bbd8d6fa5947a1c1ed9e4d6a36467fbe292ab9d6f4c9a7d->leave($__internal_5d0ebf6f867ecf406bbd8d6fa5947a1c1ed9e4d6a36467fbe292ab9d6f4c9a7d_prof);

    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:exception_full.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 12,  72 => 11,  58 => 8,  52 => 7,  42 => 4,  36 => 3,  11 => 1,);
    }
}
/* {% extends '@Twig/layout.html.twig' %}*/
/* */
/* {% block head %}*/
/*     <link href="{{ absolute_url(asset('bundles/framework/css/exception.css')) }}" rel="stylesheet" type="text/css" media="all" />*/
/* {% endblock %}*/
/* */
/* {% block title %}*/
/*     {{ exception.message }} ({{ status_code }} {{ status_text }})*/
/* {% endblock %}*/
/* */
/* {% block body %}*/
/*     {% include '@Twig/Exception/exception.html.twig' %}*/
/* {% endblock %}*/
/* */
