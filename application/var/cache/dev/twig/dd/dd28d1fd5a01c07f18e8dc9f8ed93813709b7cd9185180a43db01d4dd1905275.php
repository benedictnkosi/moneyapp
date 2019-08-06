<?php

/* ::base.html.twig */
class __TwigTemplate_9499cb6312ca38cf27e9898413dccd6b431627ea628543a333b27050e83d00b7 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_5ead80e06416ffe44f9850fed1860b527c1246e49cad87fd56e773b49a078f88 = $this->env->getExtension("native_profiler");
        $__internal_5ead80e06416ffe44f9850fed1860b527c1246e49cad87fd56e773b49a078f88->enter($__internal_5ead80e06416ffe44f9850fed1860b527c1246e49cad87fd56e773b49a078f88_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "::base.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 6
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 7
        echo "        <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
    </head>
    <body>
        ";
        // line 10
        $this->displayBlock('body', $context, $blocks);
        // line 11
        echo "        ";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 12
        echo "    </body>
</html>
";
        
        $__internal_5ead80e06416ffe44f9850fed1860b527c1246e49cad87fd56e773b49a078f88->leave($__internal_5ead80e06416ffe44f9850fed1860b527c1246e49cad87fd56e773b49a078f88_prof);

    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        $__internal_88661008d522f97b8dd10b4f79403538641c7bdb355e3d8419b3e179bf9f73b3 = $this->env->getExtension("native_profiler");
        $__internal_88661008d522f97b8dd10b4f79403538641c7bdb355e3d8419b3e179bf9f73b3->enter($__internal_88661008d522f97b8dd10b4f79403538641c7bdb355e3d8419b3e179bf9f73b3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Welcome!";
        
        $__internal_88661008d522f97b8dd10b4f79403538641c7bdb355e3d8419b3e179bf9f73b3->leave($__internal_88661008d522f97b8dd10b4f79403538641c7bdb355e3d8419b3e179bf9f73b3_prof);

    }

    // line 6
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_749ff40aefb68452a224d0fb7a3e1cff83bb7809dc0dce4678805858cd0c1ec6 = $this->env->getExtension("native_profiler");
        $__internal_749ff40aefb68452a224d0fb7a3e1cff83bb7809dc0dce4678805858cd0c1ec6->enter($__internal_749ff40aefb68452a224d0fb7a3e1cff83bb7809dc0dce4678805858cd0c1ec6_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        
        $__internal_749ff40aefb68452a224d0fb7a3e1cff83bb7809dc0dce4678805858cd0c1ec6->leave($__internal_749ff40aefb68452a224d0fb7a3e1cff83bb7809dc0dce4678805858cd0c1ec6_prof);

    }

    // line 10
    public function block_body($context, array $blocks = array())
    {
        $__internal_711c9de85f45efa7a05590b81c8ffb76a360999d6e79977bbe2608c14cdca545 = $this->env->getExtension("native_profiler");
        $__internal_711c9de85f45efa7a05590b81c8ffb76a360999d6e79977bbe2608c14cdca545->enter($__internal_711c9de85f45efa7a05590b81c8ffb76a360999d6e79977bbe2608c14cdca545_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_711c9de85f45efa7a05590b81c8ffb76a360999d6e79977bbe2608c14cdca545->leave($__internal_711c9de85f45efa7a05590b81c8ffb76a360999d6e79977bbe2608c14cdca545_prof);

    }

    // line 11
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_6353dc266cf6f558627219d4b455a836f861d578447d3955705276dd1b1d23cf = $this->env->getExtension("native_profiler");
        $__internal_6353dc266cf6f558627219d4b455a836f861d578447d3955705276dd1b1d23cf->enter($__internal_6353dc266cf6f558627219d4b455a836f861d578447d3955705276dd1b1d23cf_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        
        $__internal_6353dc266cf6f558627219d4b455a836f861d578447d3955705276dd1b1d23cf->leave($__internal_6353dc266cf6f558627219d4b455a836f861d578447d3955705276dd1b1d23cf_prof);

    }

    public function getTemplateName()
    {
        return "::base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  93 => 11,  82 => 10,  71 => 6,  59 => 5,  50 => 12,  47 => 11,  45 => 10,  38 => 7,  36 => 6,  32 => 5,  26 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html>*/
/*     <head>*/
/*         <meta charset="UTF-8" />*/
/*         <title>{% block title %}Welcome!{% endblock %}</title>*/
/*         {% block stylesheets %}{% endblock %}*/
/*         <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />*/
/*     </head>*/
/*     <body>*/
/*         {% block body %}{% endblock %}*/
/*         {% block javascripts %}{% endblock %}*/
/*     </body>*/
/* </html>*/
/* */
