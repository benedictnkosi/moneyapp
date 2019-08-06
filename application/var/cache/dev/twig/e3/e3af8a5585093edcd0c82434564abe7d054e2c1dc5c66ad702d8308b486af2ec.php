<?php

/* @Twig/Exception/exception_full.html.twig */
class __TwigTemplate_230d96838cac68ef51174f89e73ec4082d05eea34e6640436b7867dd5c0e0678 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@Twig/layout.html.twig", "@Twig/Exception/exception_full.html.twig", 1);
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
        $__internal_ec609989f8d3cd59b87ce43d727535ab0aba9b4cc17d88e47cae28621aca44da = $this->env->getExtension("native_profiler");
        $__internal_ec609989f8d3cd59b87ce43d727535ab0aba9b4cc17d88e47cae28621aca44da->enter($__internal_ec609989f8d3cd59b87ce43d727535ab0aba9b4cc17d88e47cae28621aca44da_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_ec609989f8d3cd59b87ce43d727535ab0aba9b4cc17d88e47cae28621aca44da->leave($__internal_ec609989f8d3cd59b87ce43d727535ab0aba9b4cc17d88e47cae28621aca44da_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_81928f809ff82fb71bbc11b57516b068f548cb2ded02f9a84cdcef2d87c1a81c = $this->env->getExtension("native_profiler");
        $__internal_81928f809ff82fb71bbc11b57516b068f548cb2ded02f9a84cdcef2d87c1a81c->enter($__internal_81928f809ff82fb71bbc11b57516b068f548cb2ded02f9a84cdcef2d87c1a81c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('request')->generateAbsoluteUrl($this->env->getExtension('asset')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_81928f809ff82fb71bbc11b57516b068f548cb2ded02f9a84cdcef2d87c1a81c->leave($__internal_81928f809ff82fb71bbc11b57516b068f548cb2ded02f9a84cdcef2d87c1a81c_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_d5e613495ab952bb7f5c5bebfda67fc78e7c1dd1307bee8f7c1b2a23f20311b4 = $this->env->getExtension("native_profiler");
        $__internal_d5e613495ab952bb7f5c5bebfda67fc78e7c1dd1307bee8f7c1b2a23f20311b4->enter($__internal_d5e613495ab952bb7f5c5bebfda67fc78e7c1dd1307bee8f7c1b2a23f20311b4_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_d5e613495ab952bb7f5c5bebfda67fc78e7c1dd1307bee8f7c1b2a23f20311b4->leave($__internal_d5e613495ab952bb7f5c5bebfda67fc78e7c1dd1307bee8f7c1b2a23f20311b4_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_ab470db0b2e9b3cd21729e16e0fea017ec22569b24f6043a76b2cb7ef3fde2a8 = $this->env->getExtension("native_profiler");
        $__internal_ab470db0b2e9b3cd21729e16e0fea017ec22569b24f6043a76b2cb7ef3fde2a8->enter($__internal_ab470db0b2e9b3cd21729e16e0fea017ec22569b24f6043a76b2cb7ef3fde2a8_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("@Twig/Exception/exception.html.twig", "@Twig/Exception/exception_full.html.twig", 12)->display($context);
        
        $__internal_ab470db0b2e9b3cd21729e16e0fea017ec22569b24f6043a76b2cb7ef3fde2a8->leave($__internal_ab470db0b2e9b3cd21729e16e0fea017ec22569b24f6043a76b2cb7ef3fde2a8_prof);

    }

    public function getTemplateName()
    {
        return "@Twig/Exception/exception_full.html.twig";
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
