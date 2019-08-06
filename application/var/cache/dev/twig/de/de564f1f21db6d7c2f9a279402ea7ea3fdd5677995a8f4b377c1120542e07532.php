<?php

/* base.html.twig */
class __TwigTemplate_e8188f77a7c760bf6d9ad028baa15f3fb1d800a9c3fd8d16cb41ef7ec66d6777 extends Twig_Template
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
        $__internal_42aaa293ec7c6ce275ef95f60f69d66e64911b8566001acb6822f287e66447e8 = $this->env->getExtension("native_profiler");
        $__internal_42aaa293ec7c6ce275ef95f60f69d66e64911b8566001acb6822f287e66447e8->enter($__internal_42aaa293ec7c6ce275ef95f60f69d66e64911b8566001acb6822f287e66447e8_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "base.html.twig"));

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
        
        $__internal_42aaa293ec7c6ce275ef95f60f69d66e64911b8566001acb6822f287e66447e8->leave($__internal_42aaa293ec7c6ce275ef95f60f69d66e64911b8566001acb6822f287e66447e8_prof);

    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        $__internal_bcdb2e250d16c3766f14cb36b80614df6b68a330ec30d6eb72680342020897f7 = $this->env->getExtension("native_profiler");
        $__internal_bcdb2e250d16c3766f14cb36b80614df6b68a330ec30d6eb72680342020897f7->enter($__internal_bcdb2e250d16c3766f14cb36b80614df6b68a330ec30d6eb72680342020897f7_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Welcome!";
        
        $__internal_bcdb2e250d16c3766f14cb36b80614df6b68a330ec30d6eb72680342020897f7->leave($__internal_bcdb2e250d16c3766f14cb36b80614df6b68a330ec30d6eb72680342020897f7_prof);

    }

    // line 6
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_3368b4d6e0a7b687d3121fe33afb3cf6a18ef64f261fe8352ce427aef9f9e849 = $this->env->getExtension("native_profiler");
        $__internal_3368b4d6e0a7b687d3121fe33afb3cf6a18ef64f261fe8352ce427aef9f9e849->enter($__internal_3368b4d6e0a7b687d3121fe33afb3cf6a18ef64f261fe8352ce427aef9f9e849_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        
        $__internal_3368b4d6e0a7b687d3121fe33afb3cf6a18ef64f261fe8352ce427aef9f9e849->leave($__internal_3368b4d6e0a7b687d3121fe33afb3cf6a18ef64f261fe8352ce427aef9f9e849_prof);

    }

    // line 10
    public function block_body($context, array $blocks = array())
    {
        $__internal_7ccc830ead5643206c80e0021ad288c5528c0c649320f174e91a744507272106 = $this->env->getExtension("native_profiler");
        $__internal_7ccc830ead5643206c80e0021ad288c5528c0c649320f174e91a744507272106->enter($__internal_7ccc830ead5643206c80e0021ad288c5528c0c649320f174e91a744507272106_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_7ccc830ead5643206c80e0021ad288c5528c0c649320f174e91a744507272106->leave($__internal_7ccc830ead5643206c80e0021ad288c5528c0c649320f174e91a744507272106_prof);

    }

    // line 11
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_579ec7eb3762d8acf4f375f40bbd2aa759d3cd84b2d63b9c92bd953a52406e41 = $this->env->getExtension("native_profiler");
        $__internal_579ec7eb3762d8acf4f375f40bbd2aa759d3cd84b2d63b9c92bd953a52406e41->enter($__internal_579ec7eb3762d8acf4f375f40bbd2aa759d3cd84b2d63b9c92bd953a52406e41_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        
        $__internal_579ec7eb3762d8acf4f375f40bbd2aa759d3cd84b2d63b9c92bd953a52406e41->leave($__internal_579ec7eb3762d8acf4f375f40bbd2aa759d3cd84b2d63b9c92bd953a52406e41_prof);

    }

    public function getTemplateName()
    {
        return "base.html.twig";
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
